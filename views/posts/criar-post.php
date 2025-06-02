<?php 
include __DIR__ . '/../layout/header.php';
?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h4 class="mb-4 fw-bold text-primary">Novo Tweet</h4>
                    <form action="criar" method="post">
                        <div class="mb-3 d-flex align-items-start">
                            <i class="bi bi-person-circle text-secondary me-3" style="font-size:2.5rem;"></i>
                            <textarea class="form-control border-0 bg-light rounded-3" name="conteudo" rows="8"
                                placeholder="O que está acontecendo?" maxlength="280" required
                                style="resize:none;"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="url" class="form-control" name="anexo"
                                placeholder="Anexo: (Cole o link aqui, opcional)">
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="../" class="btn btn-link text-decoration-none">Cancelar</a>
                            <button type="submit"
                                class="btn btn-primary rounded-pill px-4 py-2 fw-bold">Tweetar</button>
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