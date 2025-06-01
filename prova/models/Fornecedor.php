<?php
require_once __DIR__ . '/../config/banco.php';

class Fornecedor {

    public static function encontrarFornecedores()  {
        $banco = Banco::getConn();
        return $banco->query("SELECT * FROM fornecedores");
    }
    
    public static function criarFornecedor($nome, $email, $tel, $end) {
        $banco = Banco::getConn();
        $sql = "INSERT INTO fornecedores (nome_empresa, telefone_principal, email_principal, endereco) VALUES ('$nome','$tel','$email','$end')";
        return $banco->query($sql);
    }
    
    public static function apagar($idFornecedor) {
        $banco = Banco::getConn();
        return $banco->query("DELETE FROM fornecedores WHERE id='$idFornecedor'");
    }
    
}
