<?php
     include_once('../model/conexao.class.php');

     $conn = new Crud("produtos");

     $result = $conn->excluiCrud($_GET);

     if(!$result){
        ?>
            <script>
                alert("Erro ao deletar produto!");
                window.location.href="listProdutos.php";
            </script>
        <?php
     }else{
        ?>
            <script>
                alert("Produto deletado com sucesso!");
                window.location.href="listProdutos.php";
            </script>
        <?php
     }
?>