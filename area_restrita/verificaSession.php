<?php
    session_name('petshop');
    session_start();

    if(!isset($_SESSION['nome']) || $_SESSION['is_logado']!=1){
        ?>
            <script>
                alert("Sessão expirada!\r\nEfetue login novamente");
                window.location.href="index.php";
            </script>
        <?php
    }
?>