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
<div class="d-flex mb-3 justify-content-end align-items-center">
    <div class="dropdown ms-2 mx-2">
        <button class="btn btn-light btn-sm rounded-circle" type="button"
            id="dropdownMenuButtonMensagem<?php echo $mensagem['id_mensagem_privada']; ?>" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="bi bi-three-dots"></i>
        </button>
        <ul class="dropdown-menu"
            aria-labelledby="dropdownMenuButtonMensagem<?php echo $mensagem['id_mensagem_privada']; ?>">
            <li><a class="dropdown-item"
                    href="/php-twitter/mensagem/editar/<?php echo $mensagem['id_mensagem_privada']; ?>">Editar</a>
            </li>
            <li><a class="dropdown-item text-danger"
                    href="/php-twitter/mensagem/apagar/<?php echo $mensagem['id_mensagem_privada']; ?>"
                    onclick="return confirm('Tem certeza que deseja excluir esta mensagem?');">Apagar</a>
            </li>
        </ul>
    </div>

    <div class="bg-primary text-white rounded-3 p-2 px-3 shadow-sm d-flex align-items-center">
        <div><?php echo $mensagem['conteudo'] ?></div>
        <small class="text-light ms-2" style="font-size: 0.7rem;"><?php echo $mensagem['data_envio'] ?></small>
    </div>
</div>

<?php } else { ?>

<div class="d-flex mb-3">
    <div class="me-auto <?= $_SESSION['bgLayout'] ?? 'bg-white' ?> rounded-3 p-2 px-3 shadow-sm">
        <div><?php echo $mensagem['conteudo'] ?></div>
        <small class="text-muted" style="font-size: 0.7rem;"><?php echo $mensagem['data_envio'] ?></small>
    </div>
</div>
<?php } ?>

<?php } ?>