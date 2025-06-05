<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h4 class="mb-4 fw-bold text-primary">Editar Mensagem</h4>
                    <form method="post">
                        <div class="mb-3">
                            <textarea class="form-control" id="conteudo" name="conteudo" rows="6" maxlength="255"
                                required><?php echo htmlspecialchars($mensagem['conteudo'] ?? '', ENT_QUOTES); ?></textarea>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="/php-twitter/mensagem/<?php echo $mensagem['id_usuario_destinatario']; ?>"
                                class="btn btn-link text-decoration-none">Cancelar</a>
                            <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-bold">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>