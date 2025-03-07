<?php
session_start();
ob_start();
include $_SERVER['DOCUMENT_ROOT'].'/Projeto-ong/public/src/config/db_connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $stmt = $conn->prepare("SELECT id, nome, senha, tipo FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        // Verifica a senha
        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['username'] = $usuario['nome'];
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $usuario['tipo'];

            // Redireciona conforme o tipo de usuário
            ob_end_clean();
            switch ($usuario['tipo']) {
                case 'aprendiz':
                    header("Location: /Projeto-ong/public/painel_aprendiz.php");
                    break;
                case 'professor':
                    header("Location: /Projeto-ong/public/painel_professor.php");
                    break;
                case 'formacao_basica':
                    header("Location: /Projeto-ong/public/painel_formacao.php");
                    break;
                case 'coordenacao':
                    header("Location: /Projeto-ong/public/painel_coordenacao.php");
                    break;
                case 'administracao':
                    header("Location: /Projeto-ong/public/painel_administracao.php");
                    break;
                default:
                    header("Location: index.php");
            }
            exit();
        }
    }
    
    // Se falhar, volta para login com erro
    header("Location: login.php?erro=1");
    exit();
}

$conn->close();
ob_end_flush();
?>
