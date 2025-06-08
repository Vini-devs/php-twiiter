<?php 
include __DIR__ . '/../layout/header.php';
?>
<div class="container mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <?php if ($idUsuario == $_SESSION['id_usuario']) { ?>
                    <div class="d-flex">
                        <h4 class="mb-4 fw-bold text-primary">Preferências</h4>
                        <form method="get" class="d-inline mb-3 mx-5">
                            <input type="hidden" name="tema"
                                value="<?php echo getCookieCustom('tema') === 'escuro' ? 'claro' : 'escuro'; ?>">
                            <button type="submit" class="btn btn-outline-secondary rounded-pill">
                                <i
                                    class="bi <?php echo getCookieCustom('tema') === 'escuro' ? 'bi-sun' : 'bi-moon'; ?>"></i>
                                Tema
                                <?php echo getCookieCustom('tema') === 'escuro' ? 'Claro' : 'Escuro'; ?>
                            </button>
                        </form>
                    </div>
                    <hr>
                    <?php } ?>
                    <h4 class="mb-4 fw-bold text-primary">Editar Usuário</h4>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nickname" class="form-label">Nickname:</label>
                            <input type="text" id="nickname" name="nickname" class="form-control rounded-pill"
                                value="<?php echo htmlspecialchars($usuario['nickname'], ENT_QUOTES, 'UTF-8'); ?>"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control rounded-pill"
                                value="<?php echo htmlspecialchars($usuario['email'], ENT_QUOTES, 'UTF-8'); ?>"
                                required>
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

                    <?php if ($idUsuario == $_SESSION['id_usuario']) { ?>
                    <form method="post" class="mt-4">
                        <hr>
                        <h4 class="mb-4 fw-bold text-primary">Criar Nova Senha</h4>

                        <div class="mb-3">
                            <label for="senha" class="form-label">Nova Senha:</label>
                            <input type="password" id="senha" name="senha" class="form-control rounded-pill" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmar_senha" class="form-label">Confirmar Senha:</label>
                            <input type="password" id="confirmar_senha" name="confirmar_senha"
                                class="form-control rounded-pill" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-bold">Salvar
                                Senha</button>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include __DIR__ . '/../layout/footer.php';
?>