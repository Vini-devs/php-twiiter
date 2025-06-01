<?php


    function cardFornecedor($id, $nome, $email, $tel, $end, $img){
    ?>

        <div class="card">
            <img src="assets/img/fornecedores/<?=$img?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"> <?= $nome ?></h5>
                <p class="card-text">Telefone: <?= $tel ?></p>
                <p class="card-text">E-mail: <?= $email ?></p>
                <p class="card-text">Endereço: <?= $end ?></p>
                
                <a href="./fornecedores/apagar/<?= $id ?>" class="btn btn-danger">Excluir</a>
                <a href="servicos/ver/<?= $id ?>" class="btn btn-secondary">Ver Fornecedor</a>
            </div>
        </div>
        
    <?php 
    }

    
    function cardServicos($id, $titulo, $fornecedor, $preco){
    ?>

        
        <div class="card">
        <img src="../../assets/img/servicos/img-1.jpg" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?= $titulo ?></h5>
            <p class="card-text">Fornecedor ID: <?= $fornecedor ?></p>
            <p class="card-text">Preço: R$ <?= $preco ?></p>
            <a href="../../servicos/editar/<?= $id ?>" class="btn btn-secondary">Editar</a>
            <a href="../../servicos/apagar/<?= $id ?>" class="btn btn-danger">Excluir</a>
        </div>
        </div>
        
    <?php 
    }



?>