<?php

    include_once('../model/conexao.class.php');

    $conn = new Crud("produtos");

    $array_dados = array(
        'nome'=>$_POST['nome'],
        'valor_unitario'=>$_POST['valor'],
        'qtd_estoque'=>$_POST['estoque'],
        
    );

    $array_id = array(
        'id'=>$_POST['id'],
        'nome'=>$_POST['nome'],
        'valor_unitario'=>$_POST['valor'],
        'qtd_estoque'=>$_POST['estoque']
    );

    if($_POST['id'] == ""){
        $resultado = $conn->insereCrud($array_dados);
    }else{
        $resultado = $conn->atualizaCrud($array_dados, $array_id);
    }    

    if(!$resultado){
        ?>
            <script>
                alert("Erro ao inserir produto!");
                window.location.href="frmProdutos.php";
            </script>
        <?php 
    }else{
        ?>
            <script>
                alert("Produto inserido com sucesso!");
                window.location.href="listProdutos.php";
            </script>
        <?php
    }
?>