<?php
include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/cards.php';
?>
<div class="container py-4">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="list-group">
                <?php foreach ($topicos as $t): ?>
                <a href="/php-twitter/explorar?topico=<?=$t['id_topico']?>"
                    class="list-group-item list-group-item-action <?=(isset($idTopico) && $idTopico == $t['id_topico']) ? 'active' : ''?>">
                    <?= htmlspecialchars($t['nome']) ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-9">
            <?php if ($idTopico): ?>
            <h5 class="fw-bold text-primary mb-3">Posts em <?= htmlspecialchars($topicoAtual['nome'] ?? '') ?></h5>
            <div class="row justify-content-center">
                <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post) cardPost(
                        $post['id_post'],
                        $post['nickname'],
                        $post['conteudo'],
                        $post['data_postagem'],
                        $post['anexo'],
                        $post['likes'],
                        false
                    ); ?>
                <?php else: ?>
                <div class="text-muted">Nenhum post neste tópico.</div>
                <?php endif; ?>
            </div>
            <?php else: ?>
            <div class="text-muted">Escolha um tópico para visualizar os posts.</div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>
