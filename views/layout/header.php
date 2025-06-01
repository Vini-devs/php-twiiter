<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter Clone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background-color: #e6ecf0; font-family: 'Segoe UI', 'Arial', 'sans-serif'; color: #14171a;">
    <header class="py-2 shadow-sm bg-white border-bottom border-1 border-light-subtle">
        <div class="container">
            <div class="d-flex justify-content-around align-items-center">
                <h1 class="h3 mb-0 d-flex align-items-center">
                    <i class="bi bi-twitter text-primary me-2" style="font-size:2rem;"></i>
                    <a href="/php-twitter/" class="text-decoration-none text-primary fw-bold"
                        style="letter-spacing:-1px;">Twitter</a>
                </h1>
                <nav>
                    <a href="/php-twitter/post/explorar" class="btn btn-light rounded-pill me-2">Explorar</a>
                    <a href="/php-twitter/post/pesquisar" class="btn btn-light rounded-pill me-2">Pesquisar</a>
                    <a href="/php-twitter/mensagens" class="btn btn-light rounded-pill me-2">DM</a>
                    <?php if (isset($_SESSION['id_usuario'])) { ?>
                    <a href="/php-twitter/admin" class="btn btn-warning rounded-pill me-2">Admin</a>
                    <?php } ?>
                </nav>
                <div class="d-flex align-items-center">
                    <?php if (isset($_SESSION['id_usuario'])) { ?>
                    <div class="me-2 text-secondary">@<?= strtolower($_SESSION['nickname']) ?></div>
                    <a href="/php-twitter/logout" class="btn btn-light text-danger rounded-pill"> Sair </a>

                    <a href="<?php echo isset($_SESSION['id_usuario']) ? '/php-twitter/protected' : '/php-twitter/login'; ?>"
                        class="btn btn-primary rounded-pill ms-2 fw-bold">
                        <i class="bi bi-plus-circle me-1"></i> criar Tweet
                    </a>
                    <?php } else { ?>
                    <a href="/php-twitter/login" class="btn btn-primary rounded-pill ms-2 fw-bold">
                        Entrar
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </header>