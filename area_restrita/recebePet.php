<?php

    include_once('../model/conexao.class.php');

    $conn = new Crud("pet");

    $array_dados = array(
        'nome'=>$_POST['nome'],
        'idade'=>$_POST['idade'],
        'raca'=>$_POST['raca'],
        'id_dono'=>$_POST['dono']        
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
                alert("Erro ao inserir pet!");
                window.location.href="frmPet.php";
            </script>
        <?php 
    }else{
        ?>
            <script>
                alert("Pet cadastrado com sucesso!");
                window.location.href="listPet.php";
            </script>
        <?php
    }
?>