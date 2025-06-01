<?php
require_once __DIR__ . '/../../services/session.php';
// A view não deve conter lógica de sessão, POST ou autenticação.
// Receba a variável $error_message do controller.
include __DIR__ . '/../layout/header.php';
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
            <label for="email" class="form-label">Email de Usuário:</label>
            <input type="text" id="email" name="email" class="form-control rounded-pill" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" id="password" name="password" class="form-control rounded-pill" required>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill">Entrar</button>
    </form>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>