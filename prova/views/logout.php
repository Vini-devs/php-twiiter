<?php
require_once __DIR__ . '/../controllers/HomeController.php';

HomeController::logout();

header('Location: login');
exit;