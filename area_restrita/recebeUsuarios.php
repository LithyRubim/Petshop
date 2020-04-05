<?php

    include_once('../model/conexao.class.php');

    if($_POST['senha']!=$_POST['r_senha']){
        ?>
            <script>
                alert("Senhas não coincidem!");
                window.location.href="frmUsuarios.php";
            </script>
        <?php
        die();
    }

    $conn = new Crud("usuarios");

    $array_dados = array(
        'nome'=>$_POST['nome'],
        'data_nascimento'=>$_POST['dataNascimento'],
        'cpf'=>$_POST['cpf'],
        'email'=>$_POST['email'],
        'login'=>$_POST['login'],
        'senha'=>MD5($_POST['senha']),        
        'id_perfil'=>$_POST['perfil']
    );

    $array_id = array(
        'id'=>$_POST['id']
    );

    if($_POST['id'] == ""){
        $resultado = $conn->insereCrud($array_dados);
    }else{
        $resultado = $conn->atualizaCrud($array_dados, $array_id);
    }

    

    if(!$resultado){
        ?>
            <script>
                alert("Erro ao inserir usuário!");
                window.location.href="frmUsuarios.php";
            </script>
        <?php 
    }else{
        ?>
            <script>
                alert("Usuário inserido com sucesso!");
                window.location.href="listUsuarios.php";
            </script>
        <?php
    }
?>