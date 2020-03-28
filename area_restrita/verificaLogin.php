<?php
    session_name('petshop');
    session_start();

    include_once('../model/conexao.class.php');

    $login = $_POST['txtLogin'];
    $senha = md5($_POST['txtPass']);

    $array_dados = ['login'=>$login, 'senha'=>$senha];

    $crud = new Crud("usuarios");

    $users = $crud->selectCrud("*", true, $array_dados, "=");

    if(!is_array($users)){
        ?>
            <script>
                alert("Usuário e/ou Senha incorretos!");
                window.location.href="index.php";
            </script>
        <?php
    }else{
        foreach($users as $key=>$usuarios){
            $_SESSION['perfil'] = $usuarios->id_perfil;
            $_SESSION['nome'] = $usuarios->nome;
            $_SESSION['is_logado'] = 1;
        }
        ?>
            <script>
                alert("Bem-vindo, <?php echo $_SESSION['nome'] ?>");
                window.location.href="principal.php"
            </script>
        <?php
    }
?>