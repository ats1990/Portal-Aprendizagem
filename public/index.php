<!DOCTYPE html>
<html lang="pt-br">
<?php 
  // Inclui o conteúdo do <head>
  include $_SERVER['DOCUMENT_ROOT'].'/Projeto-ong/public/templates/header.php'; 
?>
<body>
    <?php
include $_SERVER['DOCUMENT_ROOT'].'/Projeto-ong/public/templates/hero-section.php'; 
include $_SERVER['DOCUMENT_ROOT'].'/Projeto-ong/public/templates/metodo-section.php'; 
include $_SERVER['DOCUMENT_ROOT'].'/Projeto-ong/public/templates/philosophy-section.php'; 
include $_SERVER['DOCUMENT_ROOT'].'/Projeto-ong/public/templates/news-updates.php'; 
include $_SERVER['DOCUMENT_ROOT'].'/Projeto-ong/public/templates/subscribe.php'; 


?>
</body>
<!-- Rodapé -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/Projeto-ong/public/templates/footer.php'; ?>

</html>