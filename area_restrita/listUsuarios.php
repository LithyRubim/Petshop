<?php
    if(!isset($_SESSION['perfil']) || $_SESSION['perfil']==2){
        ?>
            <script>
                window.location.href="index.php"
            </script>
        <?php
    }

    include_once('../model/conexao.class.php');

    $conn = new Crud("usuarios");
    $conn2 = new Crud("perfil");

    $result = $conn->selectCrud("*");
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

    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body class="bg-light">
    <div class="container">
    <?php
        if($_SESSION['perfil']==1){
            include_once("incMenuAdm.php");
        }
    ?>
    </div>
   
	<div class="container">
        <div class="card-body d-flex flex-column align-items-start">
            <button type="button" class="btn btn-success" onclick="window.location.href='frmUsuarios.php'">Novo Usuário</button>
        </div>
		<div class="row">
            <div class="card-body d-flex flex-column align-items-start">
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Nome</th>
                            <th class="th-sm">Data de Nascimento</th>
                            <th class="th-sm">CPF</th>
                            <th class="th-sm">E-mail</th>
                            <th class="th-sm">Perfil</th>
                            <th class="th-sm">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($result as $key=>$usuario){
                                ?>
                                    <tr>
                                        <td><?php echo $usuario->nome ?></td>
                                        <td><?php echo $conn->convertData($usuario->data_nascimento) ?></td>
                                        <td><?php echo $usuario->cpf ?></td>
                                        <td><?php echo $usuario->email ?></td>
                                        <td>
                                            <?php
                                                //$array_perfil = array()

                                                $result = $conn2->selectCrud("perfil", true, array('id'=>$usuario->id_perfil));
                                                foreach($result as $key=>$perfil){
                                                    echo $perfil->perfil;
                                                }
                                            ?>
                                        </td>
                                        <td width="5%">
                                            <a href="frmUsuarios.php?id=<?php echo $usuario->id ?>" style="text-decoration: none; cursor: pointer;">
                                                <img src="img/edit.png" width="40%" />
                                            </a>
                                            <a href="#" onclick="if(confirm('Deseja realmente deletar este usuário?')){ window.location.href='excluiUsuarios.php?id=<?php echo $usuario->id ?>'; }" style="text-decoration: none; cursor: pointer;">
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