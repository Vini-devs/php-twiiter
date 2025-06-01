<?php
require_once __DIR__ . '/../config/banco.php';

class Servico {

    public static function buscarServicos() {
        $banco = Banco::getConn();
        return $banco->query("SELECT * FROM servicos");
        // return algo;
    }

    public static function buscarServicosDeUmFornecedor($idFornecedor) {
        $banco = Banco::getConn();
        return $banco->query("SELECT * FROM servicos WHERE fornecedor_id='$idFornecedor'");
        // return algo;
    }

    public static function getById($id) {
        $banco = Banco::getConn();
        return $banco->query("SELECT * FROM servicos WHERE id=$id");
        // return algo;
    }

    public static function editar($idServico, $idFornecedor, $titulo, $preco) {
        $banco = Banco::getConn();
        $sql = "UPDATE servicos SET fornecedor_id=$idFornecedor, titulo='$titulo', preco=$preco WHERE id='$idServico'";
        return $banco->query($sql);
    }


    public static function apagar($id) {
        $banco = Banco::getConn();
        return $banco->query("DELETE FROM servicos WHERE id=$id");
    }
}
?>