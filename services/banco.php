<?php
$dsn = 'mysql:host=localhost;dbname=twitter;charset=utf8';
$user = 'root';
$pass = '';
try {
    $banco = new PDO($dsn, $user, $pass);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
}

function fazerLogin($email, $senha){
    global $banco;
    $q = "SELECT * FROM usuario WHERE email = :email";
    $stmt = $banco->prepare($q);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $obj_usuario = $stmt->fetch(PDO::FETCH_OBJ);
    if(!$obj_usuario){
        return [false, "usuario nao encontrado"];
    } else {
        if($senha == $obj_usuario->senha){
            $_SESSION["nickname"] = $obj_usuario->nickname;
            $_SESSION["id_usuario"]  = $obj_usuario->id_usuario;
            
            return [true, "sucesso"];
        } else {
            return [false, "erro na senha ou usuario"];
        }
    }
}

?>