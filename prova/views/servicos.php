<?php 
  require __DIR__ . '/layout/header.php'; 
  require __DIR__ . '/layout/cards.php';
  require_once __DIR__ . '/../models/Servico.php';


  $url = $_GET['url'] ?? null;
  $url = explode("/", $url);
  
  $servicos = Servico::buscarServicosDeUmFornecedor($url[2]);
?>

<h2>Serviços</h2>

<div class="cards-container">
  <?php
    while($servico_obj = $servicos){
      $servico = $servico_obj->fetch_object();
      if ($servico == null) {
        break;
      }
      // var_dump($servico);
      cardServicos($servico->id, $servico->titulo, $servico->fornecedor_id, $servico->preco); 
    }
  ?>
</div>

<?php require __DIR__ . '/layout/footer.php'; ?>