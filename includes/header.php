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
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0 d-flex align-items-center">
                    <i class="bi bi-twitter text-primary me-2" style="font-size:2rem;"></i>
                    <a href="index.php" class="text-decoration-none text-primary fw-bold"
                        style="letter-spacing:-1px;">Twitter</a>
                </h1>
                <nav>
                    <a href="index.php" class="btn btn-light rounded-pill me-2">Página Inicial</a>
                    <a href="filter.php" class="btn btn-light rounded-pill me-2">Explorar</a>
                    <a href="login.php" class="btn btn-light rounded-pill me-2">Entrar</a>
                </nav>
                <div class="d-flex align-items-center">
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['username']): ?>
                    <div class="me-2 text-secondary">@<?= strtolower($_SESSION['username']) ?></div>
                    <form method="POST" class="d-inline-flex align-items-center">
                        <button type="submit" name="logout" class="btn btn-light text-danger rounded-pill">Sair</button>
                    </form>
                    <?php endif; ?>
                    <a href="<?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] ? 'protected.php' : 'login.php'; ?>"
                        class="btn btn-primary rounded-pill ms-2 fw-bold">
                        <i class="bi bi-plus-circle me-1"></i> Novo Tweet
                    </a>
                </div>
            </div>
        </div>
    </header>
    <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
        session_destroy();
        header('Location: index.php');
        exit;
    }
    ?>