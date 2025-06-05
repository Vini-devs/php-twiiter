<?php

function listaUsuario($id, $nickname) { ?>
<li class="list-group-item list-group-item-action d-flex align-items-center">
    <a href="/php-twitter/mensagem/<?php echo $id; ?>"
        class="btn btn-link text-decoration-none w-100 text-start d-flex align-items-center">
        <i class="bi bi-person-circle text-secondary me-2" style="font-size:1.8rem;"></i>
        <div>
            <div class="fw-bold">@<?php echo $nickname; ?></div>
            <small class="text-muted">Última mensagem...</small>
        </div>
    </a>
</li>
<?php } ?>

<?php function listaMensagem($idUsuario, $mensagem) { ?>
<?php if ($idUsuario == $mensagem['id_usuario_remetente']) { ?>
<div class="d-flex mb-3">
    <div class="me-auto bg-white rounded-3 p-2 px-3 shadow-sm">
        <div><?php echo $mensagem['conteudo'] ?></div>
        <small class="text-muted" style="font-size: 0.7rem;"><?php echo $mensagem['data_envio'] ?></small>
    </div>
</div>

<?php } else { ?>
<div class="d-flex mb-3 justify-content-end">
    <div class="ms-auto bg-primary text-white rounded-3 p-2 px-3 shadow-sm">
        <div><?php echo $mensagem['conteudo'] ?></div>
        <small class="text-light" style="font-size: 0.7rem;"><?php echo $mensagem['data_envio'] ?></small>
    </div>
</div>
<?php } ?>

<?php } ?>