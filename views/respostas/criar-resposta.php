<?php 
include __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/cards.php';
?>
<div class="container py-4">
    <div class="row justify-content-center">
        <!-- Post principal -->
        <?php if (isset($post)): ?>
        <?php cardPost($post['id_post'], $post['nickname'], $post['conteudo'], $post['data_postagem'], $post['anexo'], $post['likes'] ?? 0, $_SESSION['id_usuario'] == $post['id_usuario']); ?>
        <?php endif; ?>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h5 class="mb-4 fw-bold text-primary">Responder ao Post</h5>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3 d-flex align-items-start">
                            <i class="bi bi-person-circle text-secondary me-3" style="font-size:2.5rem;"></i>
                            <textarea class="form-control border-0 bg-light rounded-3" name="conteudo" rows="6"
                                placeholder="Comente Aqui..." maxlength="280" required style="resize:none;"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="url" class="form-control" name="anexo"
                                placeholder="Anexo: (Cole o link aqui, opcional)">
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="javascript:history.back()" class="btn btn-link text-decoration-none">Cancelar</a>
                            <button type="submit"
                                class="btn btn-primary rounded-pill px-4 py-2 fw-bold">Responder</button>
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