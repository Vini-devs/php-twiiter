<?php
function cardPosts($id_post, $nickname, $conteudo, $data_postagem, $anexo, $likes) { ?>
<div class="col-md-8 mb-4">
    <div class="card border-1 border-light-subtle rounded-4 shadow-sm bg-white">
        <div class="card-body d-flex flex-column">
            <div class="d-flex align-items-center mb-2">
                <i class="bi bi-person-circle text-secondary me-2" style="font-size:1.5rem;"></i>
                <span
                    class="fw-bold text-primary">@<?php echo strtolower(str_replace(' ', '', escape($nickname))); ?></span>
            </div>
            <p class="card-text mb-2"><?php echo escape($conteudo); ?></p>
            <?php if (!empty($anexo)): ?>
            <img src="<?php echo escape($anexo); ?>" class="card-img-top object-fit-cover rounded-4 mb-3"
                alt="Imagem do tweet" style="height:180px; object-fit:cover;">
            <?php endif; ?>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <span class="text-muted small"><i class="bi bi-clock me-1"></i>
                    <?php echo date('d/m/Y', strtotime($data_postagem)); ?></span>
                <a href="respostas/<?php echo $id_post; ?>" class="btn btn-light rounded-pill"><i
                        class="bi bi-chat-dots me-1"></i> Ver conversa</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php function cardResposta($id_post_resposta, $id_post, $id_usuario, $conteudo, $data_postagem, $anexo, $likes) { ?>

<?php }?>