<?php
require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../services/session.php';

class PostController {
    public static function index() {
        $posts = Post::encontrarPostsRecentes();

        include __DIR__ . '/../views/posts/index.php';
    }

    public static function explorar() {
        
    }

    public static function pesquisar() {
        
    }

    public static function encontrarPost() {
        $posts = Post::encontrarPosts();

        include __DIR__ . '/../views/posts/index.php';
    }

    public static function criarPost() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idUsuario = $_SESSION['id_usuario'] ?? null;
            $conteudo = $_POST['conteudo'] ?? null;
            $anexo = $_POST['anexo'] ?? '';

            Post::criarPost($idUsuario, $conteudo, $anexo);

            if (is_null($idUsuario) || is_null($conteudo)) {
                echo "<br> Erro ao postar, tente novamente";
            } else {
                header('Location: /php-twitter/');
            }
        }

        include __DIR__ . '/../views/posts/criar-post.php';
    }

    public static function editarPost($idPost) {
        $post = Post::encontrarPostPorId($idPost);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $conteudo = $_POST['conteudo'] ?? null;
            $anexo = $_POST['anexo'] ?? '';

            Post::editarPost($idPost, $conteudo, $anexo);

            if (is_null($idPost) || is_null($conteudo)) {
                echo "<br> Erro ao postar, tente novamente";
            } else {
                header('Location: /php-twitter/');
            }
        }

        include __DIR__ . '/../views/posts/editar-post.php';
    }

    public static function apagarPost($idPost) {
        
    }
}