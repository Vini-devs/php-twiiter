<?php require __DIR__ . '/layout/header.php'; ?>

<h2>criar Fornecedor</h2>

<form action="criar" method="post">
    <input type="hidden" name="id" value="<?= $f['id'] ?>">
    
    <label>Empresa</label> 
    <input type="text" name="nome_empresa" value="<?= $f['nome_empresa'] ?? '' ?>" required>
  
    <label>Telefone</label>
    <input type="text" name="telefone_principal" value="<?= $f['telefone_principal'] ?? '' ?>">
  
    <label>E-mail</label>
    <input type="email" name="email_principal" value="<?= $f['email_principal'] ?? '' ?>">
  
    <label>Endereço</label>
    <input type="text" name="endereco" value="<?= $f['endereco'] ?? '' ?>">
  
    <button type="submit" class="btn btn-primary">Salvar</button>
  
    <a href="../fornecedores">Cancelar</a>
</form>

<?php require __DIR__ . '/layout/footer.php'; ?>