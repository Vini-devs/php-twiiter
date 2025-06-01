<?php
require __DIR__ . '/layout/header.php';
require __DIR__ . '/layout/cards.php';
require_once __DIR__ . '/../models/Fornecedor.php';

$fornecedores = Fornecedor::encontrarFornecedores();
?>

<h2>Fornecedores</h2>

<a href="fornecedores/criar" class="btn btn-primary">criar Fornecedor</a>
<br><br>

<div class="cards-container">
  <?php
    while($fornecedor_obj = $fornecedores){
      $fornecedor = $fornecedor_obj->fetch_object();
      if ($fornecedor == null) {
        break;
      }
      cardFornecedor($fornecedor->id, $fornecedor->nome_empresa, $fornecedor->email_principal, $fornecedor->telefone_principal, $fornecedor->endereco, "img-0.jpg"); 
    }
  ?>

</div>


<?php require __DIR__ . '/layout/footer.php'; ?>