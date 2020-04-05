<?php
     include_once('../model/conexao.class.php');

     $conn = new Crud("usuarios");

     $result = $conn->excluiCrud($_GET);

     if(!$result){
        ?>
            <script>
                alert("Erro ao deletar usuário!");
                window.location.href="listUsuarios.php";
            </script>
        <?php
     }else{
        ?>
            <script>
                alert("Usuário deletado com sucesso!");
                window.location.href="listUsuarios.php";
            </script>
        <?php
     }
?>