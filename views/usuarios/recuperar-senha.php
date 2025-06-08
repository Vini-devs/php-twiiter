<?php
require_once __DIR__ . '/../../services/session.php';

include __DIR__ . '/../layout/header.php';
?>
<div class="container mt-4">
    <h1 class="text-center">Login</h1>
    <?php if (!empty($error_message)): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo htmlspecialchars($error_message); ?>
    </div>
    <?php endif; ?>
    <form method="POST" class="mt-4 col-md-8 mx-auto">
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" class="form-control rounded-pill" required>
        </div>
        <div class="mb-5">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="number" id="cpf" name="cpf" class="form-control rounded-pill" required>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-primary rounded-pill">Recuperar</button>
            <?php if ($senhaRecuperada): ?>
            <div class="col-md-4 text-center mx-auto">
                <p class="small text-muted">Sua senha é:</p>
                <p><?php echo htmlspecialchars($senhaRecuperada); ?></p>
            </div>
            <?php endif; ?>
            <a href="/php-twitter/login" class="btn btn-outline-primary rounded-pill">Voltar</a>
        </div>
    </form>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>