<?php
class Banco {
    private static $conn;

    static function getConn() {
        $dsn = 'mysql:host=localhost;dbname=twitter;charset=utf8';
        $user = 'root';
        $pass = '';

        if (!isset(self::$conn)) {
        try {
                self::$conn = new PDO($dsn, $user, $pass);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
            }
        }
        return self::$conn;
        
    }
}