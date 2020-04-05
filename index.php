<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Notícias</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <a class="nav-link" href="./area_restrita">Área restrita</a>
                </li>
            </ul>
        </div>
        </nav>

    </div>
	<div class="container mt-4">
		<div class="row">
            Para acessar os produtos, acesse a "Área Restrita"

            <?php
                
                
                /*require_once("model/conexao.class.php");

                $noticias = new Crud("noticias");
                
                if (isset($_GET['pesquisar']))  {
                    echo "<div class='col-12 text-left mb-4'><h3>Você pesquisou por: " . htmlspecialchars($_GET['pesquisar']) . "</h3> </div>";
                    $pesquisa = array(
                        "titulo" => "%" . $_GET['pesquisar'] . "%"
                    );
                    $resposta = $noticias->selectCrud("*", true, $pesquisa, "LIKE");
                } else {
                    $resposta = $noticias->selectCrud("*");
                }


                if (count($resposta) == 0) {
                    echo "<div class='col-12 text-center'><h3>Nenhuma notícia encontrada</h3> </div>";
                }
                

				foreach($resposta as $indice => $valor) {
                    echo '<div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                            <h3 class="mb-0">
                                <a class="text-dark" href="noticia.php?id_noticia=' . htmlspecialchars($valor->id_noticia) . '">' . htmlspecialchars($valor->titulo) . '</a>
                            </h3>
                            <div class="mb-1 text-muted">' . htmlspecialchars($valor->data) . '</div>
                            <p class="card-text mb-auto">' . htmlspecialchars($valor->resumo) . '</p>
                            <a href="noticia.php?id_noticia=' . $valor->id_noticia . '">Continue lendo</a>
                            </div>
                            <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_170cb1ff5b9%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_170cb1ff5b9%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.1953125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                        </div>
                        </div>';
				}*/
            ?>

        
        </div>
		
	</div>
</body>
</html>
