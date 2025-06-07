<?php 
include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/cards.php';
?>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4 align-items-center">
                    <div class="d-flex justify-content-between mb-4">
                        <div class="d-flex">
                            <i class="bi bi-person-circle text-secondary me-3" style="font-size:3rem;"></i>
                            <div class="text-muted small">
                                <h4 class="fw-bold mb-0 pt-2 text-primary">
                                    @<?php echo strtolower(str_replace(' ', '', escape($usuario['nickname'] ?? 'usuario'))); ?>
                                </h4>
                                <?php if($usuario['tipo'] != "normal") { ?>
                                <p class="text-danger">Este usuário é um <?php echo ucwords($usuario['tipo']) ?></p>
                                <?php } ?>

                            </div>
                        </div>


                        <a href="/php-twitter/usuario/editar/<?= $usuario['id_usuario'] ?>" class="btn btn-outline-primary rounded-pill my-auto" style="border: none;"
                            height="1rem"><i class="bi bi-pen" style="font-size:1.5rem;"></i></a>

                    </div>
                    <hr>
                    <div class="mb-3">
                        <span><b>Email:</b> <?php echo $usuario['email']?> </span>
                    </div>
                    <div class="mb-3">
                        <span><b>Bio:</b> <?php echo $usuario['bio']?></span>
                    </div>
                    <hr>

                    <div class="mb-3 d-flex flex-column align-items-center justify-content-center">
                        <?php foreach ($posts as $post) cardPost(
                            $post['id_post'], 
                            $post['nickname'], 
                            $post['conteudo'], 
                            $post['data_postagem'], 
                            $post['anexo'], 
                            $post['likes'],
                            true 
                        );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>