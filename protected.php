<?php
session_start();

include 'data/items.php';
include 'functions/helpers.php';

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}

if (!isset($_SESSION['items'])) {
    include 'data/items.php';
    $_SESSION['items'] = $items;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newItem = [
        'id' => count($_SESSION['items']) + 1,
        'title' => $_POST['title'] ?? '',
        'image' => $_POST['image'] ?? '',
        'topic' => $_POST['topic'] ?? '',
        'description' => $_POST['description'] ?? '',
    ];

    $_SESSION['items'][] = $newItem;
    header('Location: protected.php');
    exit;
}

$items = $_SESSION['items'];

include 'includes/header.php';
?>

<div class="container mt-4">
    <a href="index.php" class="btn btn-secondary rounded-pill mb-3">Voltar à Timeline</a>
    <h1 class="text-center">Página Protegida</h1>
    <p class="text-center">Bem-vindo, @<?php echo htmlspecialchars(strtolower($_SESSION['username'])); ?>!</p>
    <h2 class="mt-4">Novo Tweet</h2>
    <form method="POST" action="protected.php" class="mt-3">
        <div class="mb-3">
            <label for="title" class="form-label">Título do Tweet:</label>
            <input type="text" id="title" name="title" class="form-control rounded-pill" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">URL da Imagem:</label>
            <input type="text" id="image" name="image" class="form-control rounded-pill" required>
        </div>
        <div class="mb-3">
            <label for="topic" class="form-label">Tópico:</label>
            <input type="text" id="topic" name="topic" class="form-control rounded-pill" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Conteúdo do Tweet:</label>
            <textarea id="description" name="description" class="form-control rounded-4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill">Tweetar</button>
    </form>

    <h2 class="mt-4">Tweets Cadastrados</h2>
    <div class="row">
        <?php foreach ($items as $item): ?>
        <div class="col-md-4 mb-4">
            <div class="card border-1 border-light-subtle rounded-4 shadow-sm">
                <img src="<?php echo escape($item['image']); ?>" class="card-img-top object-fit-cover rounded-top-4"
                    alt="<?php echo escape($item['title']); ?>" style="height:200px;">
                <div class="card-body">
                    <h5 class="card-title text-primary fw-bold">
                        @<?php echo strtolower(str_replace(' ', '', escape($item['title']))); ?></h5>
                    <p class="card-text">Tópico: <?php echo $item['topic']; ?></p>
                    <p class="card-text"><?php echo $item['description']; ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>