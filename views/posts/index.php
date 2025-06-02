<?php
// A view não deve conter lógica de sessão, manipulação de GET ou redirecionamentos.
// Receba as variáveis $item do controller.
include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/cards.php';
?>
<div class="container mt-4">
    <div class="hero text-center p-5 rounded bg-white border mb-4">
        <h1 class="display-4"><i class="bi bi-twitter text-primary me-2"></i>Bem-vindo ao Twitter</h1>
        <p class="lead">Veja o que está acontecendo agora. Compartilhe seus pensamentos e conecte-se com o mundo em
            tempo real!</p>
    </div>
    <div class="row justify-content-center">
        <?php foreach ($posts as $post) cardPost(
            $post['id_post'], 
            $post['nickname'], 
            $post['conteudo'], 
            $post['data_postagem'], 
            $post['anexo'], 
            $post['likes'],
            $_SESSION['id_usuario'] == $post['id_usuario']
        );
        ?>
    </div>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>