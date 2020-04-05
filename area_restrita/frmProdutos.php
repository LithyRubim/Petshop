<?php
    include_once('../model/conexao.class.php');

    $conn = new Crud("produtos");

    if(isset($_GET['id'])){
        
        $result = $conn->selectCrud("*", true, $_GET, "=");

        foreach($result as $key=>$produtos){
            $id = $produtos->id;
            $nome = $produtos->nome;
            $valor = $produtos->valor_unitario;
            $estoque = $produtos->qtd_estoque;
        }
    }else{
        $id = "";
        $nome = "";
        $valor = "";
        $estoque = "";        
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Produtos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/form.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body class="bg-light">
    <div class="container">
        <?php
            if($_SESSION['perfil']==1){
                include_once("incMenuAdm.php");
            }else{
                include_once("incMenuCliente.php");
            }
        ?>
    </div>
	<div class="container">
		<div class="row">
            <form class="form-signin" action="recebeProdutos.php" method="post">
                <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $id ?>" />
                <h5>Cadastro de Produtos</h5>
                <br>
                <label>Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $nome ?>" required autofocus />
                <br>
                <label>Valor Unitário</label>
                <input type="number" step="0.01" id="valor" name="valor" class="form-control" value="<?php echo $valor ?>" />
                <br>
                <label>Quantidade em Estoque</label>
                <input type="number" id="estoque" name="estoque" class="form-control" value="<?php echo $estoque ?>" />
                <br>                
                <button class="btn btn-md btn-primary btn-block" type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
</body>
</html>