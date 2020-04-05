<?php
    include_once('../model/conexao.class.php');

    $conn = new Crud("usuarios");

    if(isset($_GET['id'])){
        
        $result = $conn->selectCrud("*", true, $_GET, "=");

        foreach($result as $key=>$usuarios){
            $id = $usuarios->id;
            $nome = $usuarios->nome;
            $dataNascimento = $usuarios->data_nascimento;
            $cpf = $usuarios->cpf;
            $email = $usuarios->email;
            $login = $usuarios->login;
            $id_perfil = $usuarios->id_perfil;
        }
    }else{
        $id = "";
        $nome = "";
        $dataNascimento = "";
        $cpf = "";
        $email = "";
        $login = "";
        $id_perfil = "";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Usuários</title>
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
            <form class="form-signin" action="recebeUsuarios.php" method="post">
                <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $id ?>" />
                <h5>Cadastro de Clientes</h5>
                <br>
                <label>Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $nome ?>" required autofocus />
                <br>
                <label>Data de Nascimento </label>
                <input type="date" id="dataNascimento" name="dataNascimento" class="form-control" value="<?php echo $dataNascimento ?>" />
                <br>
                <label>CPF </label>
                <input type="text" pattern="\d*" id="cpf" name="cpf" class="form-control" maxLength="11" value="<?php echo $cpf ?>" />
                <br>
                <label>E-mail</label>
                <input type="txt" id="email" name="email" class="form-control" value="<?php echo $email ?>" />
                <br>
                <label>Login</label>
                <input type="text" id="login" name="login" class="form-control" value="<?php echo $login ?>" required />
                <br>
                <label>Senha</label>
                <input type="password" id="password" name="senha" class="form-control" required />
                <br>
                <label>Repetir Senha</label>
                <input type="password" id="password" name="r_senha" class="form-control" required />
                <br>
                <label>Perfil</label>
                <select name="perfil" id="perfil" class="form-control" required>
                    <option value=""> -- Selecione um perfil -- </option>
                    <?php
                        $conn = new Crud("perfil");

                        $result = $conn->selectCrud("*", false);

                        foreach($result as $key=>$perfil){
                            ?>
                                <option value="<?php echo $perfil->id ?>"><?php echo $perfil->perfil ?></option>
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