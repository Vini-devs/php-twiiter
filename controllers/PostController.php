<?php
require_once __DIR__ . '/../services/session.php';

require_once __DIR__ . '/../functions/helpers.php';

class PostController {
    public static function index() {
        include __DIR__ . '/../data/items.php';
        $posts = $_SESSION['items'] ?? $items;
        include __DIR__ . '/../views/index.php';
    }

    public static function detalhes() {
        if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
            redirect('?p=login');
        }
        include __DIR__ . '/../data/items.php';
        $id = $_GET['id'] ?? null;
        $item = null;
        foreach ($_SESSION['items'] ?? $items as $i) {
            if ($i['id'] == $id) {
                $item = $i;
                break;
            }
        }
        if (!$item) redirect('index.php');
        include __DIR__ . '/../views/detalhes.php';
    }

    public static function novo() {
        if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
            redirect('?p=login');
        }
        $username = $_SESSION['username'] ?? '';
        $items = $_SESSION['items'] ?? [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newItem = [
                'id' => count($items) + 1,
                'title' => $_POST['title'] ?? '',
                'image' => $_POST['image'] ?? '',
                'topic' => $_POST['topic'] ?? '',
                'description' => $_POST['description'] ?? '',
            ];
            $items[] = $newItem;
            $_SESSION['items'] = $items;
            redirect('protected.php');
        }
        include __DIR__ . '/../views/protected.php';
    }

    public static function explorar() {
        
    }

    public static function pesquisar() {
        if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
            redirect('?p=login');
        }
        include __DIR__ . '/../data/items.php';
        $search = $_GET['search'] ?? '';
        $topic = $_GET['topic'] ?? '';
        $filteredItems = [];
        $allItems = $_SESSION['items'] ?? $items;
        foreach ($allItems as $item) {
            $matchesTopic = !$topic || strtolower($item['topic']) === strtolower($topic);
            $matchesSearch = !$search || stripos($item['title'], $search) !== false;
            if ($matchesTopic && $matchesSearch) {
                $filteredItems[] = $item;
            }
        }
        include __DIR__ . '/../views/pesquisar.php';
    }

    public static function protegido() {
        if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
            redirect('?p=login');
        }
        $username = $_SESSION['username'] ?? '';
        $items = $_SESSION['items'] ?? [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newItem = [
                'id' => count($items) + 1,
                'title' => $_POST['title'] ?? '',
                'image' => $_POST['image'] ?? '',
                'topic' => $_POST['topic'] ?? '',
                'description' => $_POST['description'] ?? '',
            ];
            $items[] = $newItem;
            $_SESSION['items'] = $items;
            redirect('protected.php');
        }
        include __DIR__ . '/../views/protected.php';
    }
}