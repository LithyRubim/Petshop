<?php
	require_once("model/conexao.class.php");

	if (isset($_POST['cadastrar'])) {
		if ($_POST['cadastrar'] == "noticias") {
			$noticias = new Crud("noticias");
			$array_dados = array(
				"titulo" => $_POST['titulo'],
				"data" => $_POST['data'],
				"resumo" => $_POST['resumo'],
				"texto" => $_POST['texto'],
				"autor" => $_POST['autor']
			);

			$resposta = $noticias->insereCrud($array_dados);
			if ($resposta)
				header("Location: restrito.php?cadastrar=true");
			else
				header("Location: restrito.php?cadastrar=false");
		}

	}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Restrito</title>
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
                <a class="nav-link" href="index.php">Notícias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="restrito.php">Área restrita</a>
            </li>
            </ul>
        </div>
        </nav>

    </div>
	<div class="container mt-4" id="admNoticias">		
		<div class="row">
		   <div class="col-sm-12 col-md-6 col-lg-6">
				<h2>Lista de notícias</h2>			
		   </div>
		   <div class="col-sm-12 col-md-6 col-lg-6 text-right">
				<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">Cadastro de notícias</button>
				<!-- The Modal -->
				<div class="modal fade" id="myModal">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <!-- Modal Header -->
					  <div class="modal-header">
						<h4 class="modal-title">Cadastro de notícias</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					  </div>
					  <!-- Modal body -->
					  <div class="modal-body">
							<form action="restrito.php" method="POST" class="was-validated">
								<div class="form-group text-left">
								  <label for="titulo">Título da notícia:</label>
								  <input type="text" class="form-control" id="titulo" placeholder="Título da notícia" name="titulo" required>				  
								</div>
								<div class="form-group text-left">
								  <label for="titulo">Resumo da notícia:</label>
								  <input type="text" class="form-control" id="titulo" placeholder="Resumo da notícia" name="resumo" required>				  
								</div>
								<div class="form-group text-left">
									<label for="texto">Texto da notícia:</label>
									<textarea class="form-control" id="texto" placeholder="Texto da notícia" name="texto" required></textarea>		  
								</div>
								<div class="form-group text-left">
									<label for="data">Data:</label>
									<input type="date" class="form-control" id="data" name="data" required>	  
								</div>
								<div class="form-group text-left">
									<label for="autor">Autor da notícia:</label>
									<input type="text" class="form-control" id="autor" placeholder="Autor da notícia" name="autor" required>		  
								</div>								
								<button type="submit" name="cadastrar" value="noticias" class="btn btn-primary">Cadastrar</button>
							</form>   
						</div>
					  <!-- Modal footer -->
					  <div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
					  </div>
					</div>
				  </div>
				</div>
		   </div>
		</div>
		
		<table class="table table-striped">
		<thead>
		  <tr>
			<th>Id</th>
			<th>Título</th>
			<th>Data</th>
			<th>Autor</th>
			<th class="text-center">Ações</th>
		  </tr>
		</thead>
		<tbody>
			<?php
				require_once("model/conexao.class.php");

				$noticias = new Crud("noticias");
				$resposta = $noticias->selectCrud("*");

				foreach($resposta as $indice => $valor) {
					echo "<tr>";
					echo "<td>{$valor->id_noticia}</td>";
					echo "<td>{$valor->titulo}</td>";
					echo "<td>{$valor->data}</td>";
					echo "<td>{$valor->autor}</td>";
					echo '<td class="text-center">	
					<a href="editar.php?id_noticia=' . $valor->id_noticia . '" title="Editar"><i class="fa fa-pencil"></i></a> 
					<a href="excluir.php?id_noticia=' . $valor->id_noticia  . '" title="Excluir"><i class="fa fa-trash-o text-danger"></i></a>
					</td>';
					echo "</tr>";
				}
			?>
		
		</tbody>
		</table>
    </div>
</body>
</html>
