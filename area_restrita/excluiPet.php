<?php
     include_once('../model/conexao.class.php');

     $conn = new Crud("pet");

     $result = $conn->excluiCrud($_GET);

     if(!$result){
        ?>
            <script>
                alert("Erro ao deletar pet!");
                window.location.href="listPet.php";
            </script>
        <?php
     }else{
        ?>
            <script>
                alert("Pet deletado com sucesso!");
                window.location.href="listPet.php";
            </script>
        <?php
     }
?>