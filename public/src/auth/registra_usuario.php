<?php
// Incluir o arquivo de configuração para conectar ao banco de dados
include_once 'config.php'; // Certifique-se de que o arquivo config.php esteja configurado corretamente

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Garantir que os dados estão sendo recebidos corretamente
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
    $identidade_genero = isset($_POST['identidade_genero']) ? $_POST['identidade_genero'] : '';
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
    $data_nasc = isset($_POST['data_nasc']) ? $_POST['data_nasc'] : '';
    $rg = isset($_POST['rg']) ? $_POST['rg'] : '';
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
    $escolaridade = isset($_POST['escolaridade']) ? $_POST['escolaridade'] : '';
    $periodo_escola = isset($_POST['periodo_escola']) ? $_POST['periodo_escola'] : '';
    $curso_relacionado = isset($_POST['curso_relacionado']) ? $_POST['curso_relacionado'] : '';
    $curso_qual = isset($_POST['curso_qual']) ? $_POST['curso_qual'] : '';

    // Iniciar uma transação para garantir a integridade dos dados
    $conn->begin_transaction();

    try {
        // Passo 1: Inserir o usuário na tabela 'usuarios'
        $query = "INSERT INTO usuarios (nome, email, senha, tipo, identidade_genero, sexo, data_nasc, rg, cpf) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT); // Criptografando a senha
        $stmt->bind_param("sssssssss", $nome, $email, $senha_criptografada, $tipo, $identidade_genero, $sexo, $data_nasc, $rg, $cpf);
        $stmt->execute();

        // Passo 2: Obter o ID do usuário recém inserido
        $usuario_id = $stmt->insert_id;

        // Passo 3: Inserir os dados acadêmicos na tabela 'dados_academicos_profissionais'
        $query_academico = "INSERT INTO dados_academicos_profissionais (usuario_id, escolaridade, periodo_escola, curso_relacionado, curso_qual)
                            VALUES (?, ?, ?, ?, ?)";
        $stmt_academico = $conn->prepare($query_academico);
        $stmt_academico->bind_param("issss", $usuario_id, $escolaridade, $periodo_escola, $curso_relacionado, $curso_qual);
        $stmt_academico->execute();

        // Se tudo ocorreu bem, comitar a transação
        $conn->commit();

        // Mensagem de sucesso
        echo "Usuário registrado com sucesso!";

        // Fechar os statements e a conexão
        $stmt->close();
        $stmt_academico->close();
        $conn->close();
        
    } catch (Exception $e) {
        // Se algo falhar, reverter a transação
        $conn->rollback();
        
        // Exibir a mensagem de erro
        echo "Erro ao registrar o usuário: " . $e->getMessage();

        // Fechar os statements e a conexão em caso de erro
        $stmt->close();
        $stmt_academico->close();
        $conn->close();
    }
} else {
    // Se não for uma requisição POST, redirecionar ou exibir erro
    echo "Formulário não enviado corretamente!";
}
?>
