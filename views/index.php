<?php
require_once __DIR__ . '/../services/session.php';
// A view não deve conter lógica de sessão, manipulação de GET ou redirecionamentos.
// Receba as variáveis $item do controller.
include __DIR__ . '/../components/header.php';
?>
<div class="container mt-4">
    <div class="hero text-center p-5 rounded bg-white border mb-4">
        <h1 class="display-4"><i class="bi bi-twitter text-primary me-2"></i>Bem-vindo ao Twitter</h1>
        <p class="lead">Veja o que está acontecendo agora. Compartilhe seus pensamentos e conecte-se com o mundo em
            tempo real!</p>
    </div>
    <div class="row justify-content-center">
        <?php foreach ($posts as $post): ?>
        <div class="col-md-8 mb-4">
            <div class="card border-1 border-light-subtle rounded-4 shadow-sm bg-white">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-person-circle text-secondary me-2" style="font-size:1.5rem;"></i>
                        <span
                            class="fw-bold text-primary">@<?php echo strtolower(str_replace(' ', '', escape($post['nickname']))); ?></span>
                    </div>
                    <p class="card-text mb-2"><?php echo escape($post['conteudo']); ?></p>
                    <?php if (!empty($post['anexo'])): ?>
                    <img src="<?php echo escape($post['image']); ?>"
                        class="card-img-top object-fit-cover rounded-4 mb-3" alt="Imagem do tweet"
                        style="height:180px; object-fit:cover;">
                    <?php endif; ?>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <span class="text-muted small"><i class="bi bi-clock me-1"></i>Agora mesmo</span>
                        <a href="detalhes.php?id=<?php echo $post['id_post']; ?>" class="btn btn-light rounded-pill"><i
                                class="bi bi-chat-dots me-1"></i> Ver conversa</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include __DIR__ . '/../components/footer.php'; ?>