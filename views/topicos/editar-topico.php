<?php
include __DIR__ . '/../layout/header.php';
?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h4 class="mb-4 fw-bold text-primary">Editar Tópico</h4>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" id="nome" name="nome" class="form-control rounded-pill" value="<?= htmlspecialchars($topico['nome'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="/php-twitter/dashboard" class="btn btn-link text-decoration-none">Cancelar</a>
                            <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-bold">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include __DIR__ . '/../layout/footer.php';
?>
