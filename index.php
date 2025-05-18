<?php
session_start();

include 'data/items.php';
include 'functions/helpers.php';

$tweets = $_SESSION['items'] ?? $items;

include 'includes/header.php';
?>

<div class="container mt-4">
    <div class="hero text-center p-5 rounded bg-white border mb-4">
        <h1 class="display-4"><i class="bi bi-twitter text-primary me-2"></i>Bem-vindo ao Twitter</h1>
        <p class="lead">Veja o que está acontecendo agora. Compartilhe seus pensamentos e conecte-se com o mundo em
            tempo real!</p>
    </div>
    <div class="row justify-content-center">
        <?php foreach ($tweets as $tweet): ?>
        <div class="col-md-8 mb-4">
            <div class="card border-1 border-light-subtle rounded-4 shadow-sm bg-white">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-person-circle text-secondary me-2" style="font-size:1.5rem;"></i>
                        <span
                            class="fw-bold text-primary">@<?php echo strtolower(str_replace(' ', '', escape($tweet['title']))); ?></span>
                    </div>
                    <p class="card-text mb-2"><?php echo escape($tweet['description']); ?></p>
                    <?php if (!empty($tweet['image'])): ?>
                    <img src="<?php echo escape($tweet['image']); ?>"
                        class="card-img-top object-fit-cover rounded-4 mb-3" alt="Imagem do tweet"
                        style="height:180px; object-fit:cover;">
                    <?php endif; ?>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <span class="text-muted small"><i class="bi bi-clock me-1"></i>Agora mesmo</span>
                        <a href="details.php?id=<?php echo $tweet['id']; ?>" class="btn btn-light rounded-pill"><i
                                class="bi bi-chat-dots me-1"></i> Ver conversa</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>