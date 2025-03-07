<?php
// Iniciar a sessão
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['username'])) {
    // Se não estiver logado, redirecionar para a página de login
    header("Location: login.php");
    exit();
}
?>

<?php 
  // Inclui o conteúdo do <head>
  include $_SERVER['DOCUMENT_ROOT'].'/Projeto-ong/public/templates/header.php'; 
?>


<!-- Rodapé -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/Projeto-ong/public/templates/footer.php'; ?>