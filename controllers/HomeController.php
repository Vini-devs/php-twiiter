<?php
require_once __DIR__ . '/../services/session.php';
// require_once __DIR__ . '/../services/banco.php';

class HomeController {
    public static function index() {
        global $banco;
        
        $q = "
SELECT 
    post.*, 
    usuario.nickname 
FROM post
JOIN usuario ON post.id_usuario = usuario.id_usuario
ORDER BY post.data_postagem DESC
";
        $stmt = $banco->query($q);
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include __DIR__ . '/../views/index.php';
    }
}