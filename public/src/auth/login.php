<!DOCTYPE html>
<html lang="pt-br">
<?php
// Inclui o cabeçalho da página
include $_SERVER['DOCUMENT_ROOT'] . '/Projeto-ong/public/templates/header.php';
?>

<body>
    <!-- HEADER / MENU -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Academics</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sobre nós</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Admissão</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Cursos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contato</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTEÚDO PRINCIPAL -->
    <div class="container" style="margin-top: 100px; margin-bottom: 50px;">
        <!-- row e col para centralizar horizontalmente -->
        <div class="row justify-content-center">
            <!-- Ajuste a coluna conforme necessário -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="processa_login.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" name="senha" class="form-control" required>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success px-4 py-2 rounded-0">
                                    Entrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Exibe mensagem de erro, se houver -->
                <?php if (isset($_GET['erro'])): ?>
                    <div class="alert alert-danger mt-2">
                        Usuário ou senha inválidos!
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- FOOTER -->

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Projeto-ong/public/templates/footer.php'; ?>
</body>

</html>