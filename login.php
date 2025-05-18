<?php
session_start();

$fixed_username = 'admin';
$fixed_password_hash = password_hash('123456', PASSWORD_DEFAULT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $fixed_username && password_verify($password, $fixed_password_hash)) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;

        header('Location: index.php');
        exit;
    } else {
        $error_message = 'Nome de usuário ou senha inválidos.';
    }
}

include 'includes/header.php';
?>

<div class="container mt-4">
    <h1 class="text-center">Login</h1>
    <?php if (!empty($error_message)): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo htmlspecialchars($error_message); ?>
    </div>
    <?php endif; ?>
    <form method="POST" action="" class="mt-4">
        <div class="mb-3">
            <label for="username" class="form-label">Nome de Usuário:</label>
            <input type="text" id="username" name="username" class="form-control rounded-pill" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" id="password" name="password" class="form-control rounded-pill" required>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill">Entrar</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>