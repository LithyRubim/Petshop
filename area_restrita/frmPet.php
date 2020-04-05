<?php
    include_once('../model/conexao.class.php');

    $conn = new Crud("pet");

    if(isset($_GET['id'])){
        
        $result = $conn->selectCrud("*", true, $_GET, "=");

        foreach($result as $key=>$pet){
            $id = $pet->id;
            $id_dono = $pet->id_dono;
            $nome = $pet->nome;
            $idade = $pet->idade;
            $raca = $pet->raca;

        }
    }else{
        $id = "";
        $id_dono = "";
        $nome = "";
        $idade = "";        
        $raca = "";        
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Cadastro Pets</title>
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
		<div class="row">
            <form class="form-signin" action="recebePet.php" method="post">
                <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $id ?>" />
                <h5>Cadastro de Animais</h5>
                <br>
                <label>Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $nome ?>" required autofocus />
                <br>
                <label>Idade</label>
                <input type="number" id="idade" name="idade" class="form-control" value="<?php echo $idade ?>" />
                <br>
                <label>Raça</label>
                <input type="text" id="raca" name="raca" class="form-control" value="<?php echo $raca ?>" />
                <br> 
                <label>Dono </label>
                <select name="dono" id="dono" class="form-control" required>
                    <option value=""> -- Selecione um perfil -- </option>
                    <?php
                        $conn = new Crud("usuarios");

                        $result = $conn->selectCrud("*", true, array('id_perfil'=>2));

                        foreach($result as $key=>$usuario){
                            ?>
                                <option value="<?php echo $usuario->id ?>"><?php echo $usuario->nome ?></option>
                            <?php
                        }
                    ?>
                </select>
                <br>               
                <button class="btn btn-md btn-primary btn-block" type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
</body>
</html>