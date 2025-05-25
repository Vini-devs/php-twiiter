<?php
require_once __DIR__ . '/../services/session.php';

// A view não deve conter lógica de sessão, manipulação de GET ou filtragem.
// Receba as variáveis $filteredItems, $search, $topic do controller.
include __DIR__ . '/../components/header.php';
?>
<div class="container mt-4">
    <h1 class="text-center">Filtrar Tweets</h1>
    <form method="GET" action="pesquisar.php" class="mt-4 row g-3">
        <div class="col-md-8">
            <label for="search" class="form-label">Pesquisar por Tweet:</label>
            <input type="text" name="search" id="search" class="form-control rounded-pill"
                value="<?php echo htmlspecialchars($search); ?>" placeholder="Digite o conteúdo do tweet">
        </div>
        <div class="col-md-2">
            <label for="topic" class="form-label">Tópico:</label>
            <select name="topic" id="topic" class="form-select rounded-pill">
                <option value="">Todos</option>
                <?php
                $topics = array_unique(array_column($filteredItems, 'topic'));
                foreach ($topics as $tp): ?>
                <option value="<?php echo $tp; ?>" <?php echo $tp === $topic ? 'selected' : ''; ?>>
                    <?php echo $tp; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100 rounded-pill">Filtrar</button>
        </div>
    </form>
    <div class="row mt-4">
        <?php if (empty($filteredItems)): ?>
        <p class="text-center">Nenhum tweet encontrado para os critérios selecionados.</p>
        <?php else: ?>
        <?php foreach ($filteredItems as $item): ?>
        <div class="col-md-4 mb-4">
            <div class="card border-1 border-light-subtle rounded-4 shadow-sm">
                <img src="<?php echo escape($item['image']); ?>" class="card-img-top object-fit-cover rounded-top-4"
                    alt="<?php echo escape($item['title']); ?>" style="height:200px;">
                <div class="card-body">
                    <h5 class="card-title text-primary fw-bold">
                        @<?php echo strtolower(str_replace(' ', '', escape($item['title']))); ?></h5>
                    <p class="card-text">Tópico: <?php echo $item['topic']; ?></p>
                    <a href="detalhes.php?id=<?php echo $item['id']; ?>" class="btn btn-primary rounded-pill">Ver
                        Tweet</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?php include __DIR__ . '/../components/footer.php'; ?>