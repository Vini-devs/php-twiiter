<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Gerenciamento</title>
    <link rel="stylesheet" href="/php-prova/assets/style.css">
</head>
<body>
<header style="border-radius: 8px">
    <a href="/php-prova/">
        <img src="/php-prova/assets/img/profile/prof-3.jpg" style="border-radius: 50%;" alt="Usuário" width="50">
    </a>
    <nav>
        <ul>
            <?php 
            if (isset($_SESSION['user_id']) && !is_null($_SESSION['user_id'])) {
            ?>
            <li><a href="/php-prova/fornecedores">Fornecedores</a></li>
            <li><a href="/php-prova/logout">Logout</a></li>
            <?php } else { ?>
                <li><a href="login">Login</a></li>
            <?php }?>
        </ul>
    </nav>
</header>
<div class="container">