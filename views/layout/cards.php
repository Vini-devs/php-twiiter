<?php
function cardPost($id_post, $nickname, $conteudo, $data_postagem, $anexo, $likes, $isLoggedUser = false) { ?>
<div class="col-md-8 mb-4">
    <div class="card border-1 border-light-subtle rounded-4 shadow-sm <?= $_SESSION['bgLayout'] ?? 'bg-white' ?>">
        <div class="card-body d-flex flex-column">
            <div class="d-flex align-items-center mb-2">
                <i class="bi bi-person-circle text-secondary me-2" style="font-size:1.5rem;"></i>
                <span
                    class="fw-bold text-primary">@<?php echo strtolower(str_replace(' ', '', escape($nickname))); ?></span>
                <?php if ($isLoggedUser): ?>
                <div class="ms-auto dropdown">
                    <button class="btn btn-light btn-sm rounded-circle" type="button"
                        id="dropdownMenuButton<?php echo $id_post; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo $id_post; ?>">
                        <li><a class="dropdown-item" href="/php-twitter/post/editar/<?php echo $id_post; ?>">Editar</a>
                        </li>
                        <li><a class="dropdown-item text-danger" href="/php-twitter/post/apagar/<?php echo $id_post; ?>"
                                onclick="return confirm('Tem certeza que deseja excluir este post?');">Apagar</a>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
            <p class="card-text mb-2"><?php echo escape($conteudo); ?></p>
            <?php if (!empty($anexo)): ?>
            <img src="<?php echo escape($anexo); ?>" class="card-img-top object-fit-cover rounded-4 mb-3"
                alt="Imagem do tweet" style="height:180px; object-fit:cover;">
            <?php endif; ?>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <span class="text-muted small"><i class="bi bi-clock me-1"></i>
                    <?php echo date('d/m/Y H:i:s', strtotime($data_postagem)); ?></span>
                <span class="d-flex align-items-center gap-3 justify-content-end">
                    <?php if (!isset($_GET['url']) || $_GET['url'] != "resposta/$id_post"):?>
                    <a href="/php-twitter/resposta/<?php echo $id_post; ?>"
                        class="btn btn-light rounded-pill py-0 px-3"><i class="bi bi-chat-dots me-1"></i> Ver
                        conversa</a>
                    <?php endif; ?>
                    <?php if (!isset($_GET['url']) || $_GET['url'] != "resposta/criar/$id_post"): ?>
                    <a href="/php-twitter/resposta/criar/<?php echo $id_post; ?>"
                        class="btn btn-light rounded-pill py-0 px-3"><i class="bi bi-chat me-1"></i> Responder</a>
                    <?php endif; ?>
                    <span class="text-muted small"><i class="bi bi-heart me-1"></i> <?php echo (int)$likes; ?></span>
                </span>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php function cardResposta($id_post_resposta, $id_post, $id_usuario, $nickname, $conteudo, $data_postagem, $anexo, $likes, $isLoggedUser = false) { ?>
<div class="col-md-7 mb-4">
    <div class="card border-0 border-start border-3 border-primary rounded-4 shadow-sm bg-light">
        <div class="card-body d-flex flex-column">
            <div class="d-flex align-items-center mb-2">
                <i class="bi bi-person-circle text-secondary me-2" style="font-size:1.3rem;"></i>
                <span
                    class="fw-bold text-primary small">@<?php echo strtolower(str_replace(' ', '', escape($nickname ?? 'usuario'))); ?></span>
                <?php if ($isLoggedUser): ?>
                <div class="ms-auto dropdown">
                    <button class="btn btn-light btn-sm rounded-circle" type="button"
                        id="dropdownMenuButtonResposta<?php echo $id_post_resposta; ?>" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                    </button>
                    <ul class="dropdown-menu"
                        aria-labelledby="dropdownMenuButtonResposta<?php echo $id_post_resposta; ?>">
                        <li><a class="dropdown-item"
                                href="/php-twitter/resposta/editar/<?php echo $id_post_resposta; ?>">Editar</a></li>
                        <li><a class="dropdown-item text-danger"
                                href="/php-twitter/resposta/apagar/<?php echo $id_post_resposta; ?>"
                                onclick="return confirm('Tem certeza que deseja excluir esta resposta?');">Apagar</a>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
            <p class="card-text mb-2"><?php echo escape($conteudo); ?></p>
            <?php if (!empty($anexo)): ?>
            <img src="<?php echo escape($anexo); ?>" class="card-img-top object-fit-cover rounded-4 mb-3"
                alt="Imagem da resposta" style="height:140px; object-fit:cover;">
            <?php endif; ?>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <span class="text-muted small"><i class="bi bi-clock me-1"></i>
                    <?php echo date('d/m/Y H:i:s', strtotime($data_postagem)); ?></span>
                <span class="text-muted small"><i class="bi bi-heart me-1"></i> <?php echo (int)$likes; ?></span>
            </div>
        </div>
    </div>
</div>
<?php }?>