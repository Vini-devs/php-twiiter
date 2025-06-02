<?php
include __DIR__ . '/../layout/header.php';

require_once __DIR__ . '/../layout/cards.php';
?>
<div class="container py-4">
    <div class="row justify-content-center">
        <!-- Post principal -->
        <?php if (isset($post)): ?>
        <?php cardRespostaPost($post['id_post'], $post['nickname'], $post['conteudo'], $post['data_postagem'], $post['anexo'], $post['likes'] ?? 0, $_SESSION['id_usuario'] == $post['id_usuario']); ?>
        <?php endif; ?>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <hr class="mx-auto light col-md-7">
            <h6 class="text-secondary mb-3 text-center">Respostas</h6>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <?php if (!empty($respostas)): ?>
        <?php foreach ($respostas as $resposta): ?>
        <?php cardResposta(
                        $resposta['id_post_resposta'],
                        $resposta['id_post'],
                        $resposta['id_usuario'],
                        $resposta['nickname'],
                        $resposta['conteudo'],
                        $resposta['data_postagem'],
                        $resposta['anexo'],
                        $resposta['likes'] ?? 0,
                        $_SESSION['id_usuario'] == $post['id_usuario']
                    ); ?>
        <?php endforeach; ?>
        <?php else: ?>
        <div class="text-center text-muted">Nenhuma resposta ainda.</div>
        <?php endif; ?>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>