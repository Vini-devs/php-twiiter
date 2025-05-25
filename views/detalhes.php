<?php
require_once __DIR__ . '/../services/session.php';

// A view não deve conter lógica de sessão, manipulação de GET ou redirecionamentos.
// Receba as variáveis $item do controller.
include __DIR__ . '/../components/header.php';
?>
<div class="container mt-4">
    <div class="card border-1 border-light-subtle rounded-4 shadow-sm">
        <img src="<?php echo escape($item['image']); ?>" class="card-img-top rounded-top-4"
            style="max-height: 330px; object-fit: cover;" alt="<?php echo escape($item['title']); ?>">
        <div class="card-body">
            <h5 class="card-title text-primary fw-bold">
                @<?php echo strtolower(str_replace(' ', '', escape($item['title']))); ?></h5>
            <p class="card-text">Tópico: <?php echo escape($item['topic']); ?></p>
            <p class="card-text"><?php echo escape($item['description']); ?></p>
            <a href="index.php" class="btn btn-secondary rounded-pill">Voltar</a>
        </div>
    </div>
</div>
<?php include __DIR__ . '/../components/footer.php'; ?>