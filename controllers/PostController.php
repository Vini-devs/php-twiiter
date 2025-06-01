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

        // include __DIR__ . '/../views/posts/index.php';
    }

    public static function criarPost() {
        
    }

    public static function editarPost() {
        
    }

    public static function apagarPost($idPost) {
        
    }
}