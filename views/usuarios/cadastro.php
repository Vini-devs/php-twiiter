<?php
require_once __DIR__ . '/../../services/session.php';
include __DIR__ . '/../layout/header.php';
?>
<div class="container my-4">
    <h1 class="text-center">Cadastre-se</h1>
    <?php if (!empty($error_message)): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo htmlspecialchars($error_message); ?>
    </div>
    <?php endif; ?>
    <form method="POST" action="" class="mt-4 col-md-8 mx-auto">
        <div class="mb-3">
            <label for="nickname" class="form-label">@:</label>
            <input type="text" id="nickname" name="nickname" class="form-control rounded-pill" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" id="email" name="email" class="form-control rounded-pill" required>
        </div>
        <div class="mb-5">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" id="password" name="password" class="form-control rounded-pill" required>
        </div>
        <div class="mb-5">
            <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" class="form-control rounded-pill" required>
        </div>
        <div class="mb-5">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="number" id="cpf" name="cpf" class="form-control rounded-pill" required>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill">Cadastrar</button>
    </form>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>