<?php 
include __DIR__ . '/../layout/header.php';
?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h4 class="mb-4 fw-bold text-primary">Editar Usuário</h4>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nickname" class="form-label">Nickname:</label>
                            <input type="text" id="nickname" name="nickname" class="form-control rounded-pill" 
                                value="<?php echo htmlspecialchars($usuario['nickname'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control rounded-pill" 
                                value="<?php echo htmlspecialchars($usuario['email'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio:</label>
                            <textarea id="bio" name="bio" class="form-control rounded-3" rows="4"
                                placeholder="Escreva algo sobre você..."><?php echo htmlspecialchars($usuario['bio'], ENT_QUOTES, 'UTF-8'); ?></textarea>
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
