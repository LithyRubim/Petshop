<?php
    include_once('../model/conexao.class.php');

    $conn = new Crud("produtos");
    
    $result = $conn->selectCrud("*");
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

    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body class="bg-light">
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
        <a class="navbar-brand" href="javascript:void(0)">Site</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Notícias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./area_restrita">Área restrita</a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="GET" action="index.php">
                <input class="form-control mr-sm-2" type="text" name="pesquisar" placeholder="Buscar...">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
        </div>
        </nav>

    </div>
   
	<div class="container">
        <div class="card-body d-flex flex-column align-items-start">
            <button type="button" class="btn btn-success" onclick="window.location.href='frmProdutos.php'">Novo Produto</button>
        </div>
		<div class="row">
            <div class="card-body d-flex flex-column align-items-start">
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Nome</th>
                            <th class="th-sm">Valor Unitário</th>
                            <th class="th-sm">Quantidade em Estoque</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($result as $key=>$produtos){
                                ?>
                                    <tr>
                                        <td><?php echo $produtos->nome ?></td>
                                        <td>R$ <?php echo $produtos->valor_unitario ?></td>
                                        <td><?php echo $produtos->qtd_estoque ?></td>
                                        <td width="5%">
                                            <a href="frmProdutos.php?id=<?php echo $produtos->id ?>" style="text-decoration: none; cursor: pointer;">
                                                <img src="img/edit.png" width="40%" />
                                            </a>
                                            <a href="#" onclick="if(confirm('Deseja realmente deletar este produto?')){ window.location.href='excluiProdutos.php?id=<?php echo $produtos->id ?>'; }" style="text-decoration: none; cursor: pointer;">
                                                <img src="img/delete.png" width="40%" />
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>