<?php
require_once("model/conexao.class.php");

$id_noticia = "";
$titulo = "";
$resumo = "";
$data = "";
$texto = "";
$autor = "";

if (isset($_GET['id_noticia'])) {
	$noticias = new Crud("noticias");
	$filtro = array("id_noticia" => $_GET['id_noticia']);
	$resposta = $noticias->selectCrud("*", true, $filtro);
	$id_noticia = $resposta[0]->id_noticia;
	$titulo = $resposta[0]->titulo;
	$resumo = $resposta[0]->resumo;
	$data = $resposta[0]->data;
	$texto = $resposta[0]->texto;
	$autor = $resposta[0]->autor;
}

if (isset($_POST['editar'])) {
	if ($_POST['editar'] == "noticia") {
		$noticias = new Crud("noticias");
		$array_dados = array(			
			"titulo" => $_POST['titulo'],
			"data" => $_POST['data'],
			"resumo" => $_POST['resumo'],
			"texto" => $_POST['texto'],
			"autor" => $_POST['autor']
		);

		$array_id = array("id_noticia" => $_POST['id_noticia']);

		$resposta = $noticias->atualizaCrud($array_dados, $array_id);
		if ($resposta)
			header("Location: restrito.php?editado=true");
		else
			header("Location: restrito.php?editado=false");
	}

}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Editar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="row pt-4">

			<div class="col-sm-12 col-md-12 col-lg-12">
				<div id="divNoticias" class="col-12<?php if (isset($_GET['id_noticia'])) echo ""; else echo " d-none";  ?>">
					<div class="col-sm-12 col-md-12 col-lg-12">
						<h2>Editar notícias</h2>
					</div>
					<form action="editar.php" method="POST" class="was-validated">
						<input type="hidden" name="id_noticia" value="<?php echo $id_noticia; ?>">
						<div class="form-group text-left">
							<label for="titulo">Título da notícia:</label>
							<input type="text" class="form-control" id="titulo" placeholder="Título da notícia" name="titulo" value="<?php echo $titulo; ?>" required>				  
						</div>
						<div class="form-group text-left">
							<label for="titulo">Resumo da notícia:</label>
							<input type="text" class="form-control" id="titulo" placeholder="Resumo da notícia" name="resumo" value="<?php echo $resumo; ?>" required>				  
						</div>
						<div class="form-group text-left">
							<label for="texto">Texto da notícia:</label>
							<textarea class="form-control" id="texto" placeholder="Texto da notícia" name="texto" required><?php echo $texto; ?></textarea>		  
						</div>
						<div class="form-group text-left">
							<label for="data">Data:</label>
							<input type="date" class="form-control" id="data" name="data" value="<?php echo $data; ?>" required>	  
						</div>
						<div class="form-group text-left">
							<label for="autor">Autor da notícia:</label>
							<input type="text" class="form-control" id="autor" placeholder="Autor da notícia" name="autor" value="<?php echo $autor; ?>" required>		  
						</div>								
						<button type="submit" name="editar" value="noticia" class="btn btn-primary">Cadastrar</button>
					</form>
				</div>
				<div id="divUsuarios" class="col-12<?php if (isset($_GET['id_usuario'])) echo ""; else echo " d-none";  ?>">
					<div class="col-sm-12 col-md-12 col-lg-12">
						<h2>Editar de usuário</h2>
					</div>
					<form action="editar.php" method="POST" class="was-validated">
						<div class="form-group">
							<label for="nome">Nome:</label>
							<input type="text" class="form-control" id="nome" placeholder="Nome do usuário" name="nome" value="João" required>
						</div>
						<div class="form-group text-left">
							<label for="email">Email:</label>
							<input type="email" class="form-control" id="email" placeholder="Email do usuário" name="email" value="joao@gmail.com" required>
						</div>
						<div class="form-group text-left">
							<label for="administrador">Administrador:</label>
							<select id="administrador" name="administrador" class="form-control">
								<option value="S">Sim</option>
								<option value="N">Não</option>
							</select>
						</div>
						<div class="form-group text-left">
							<label for="senha">Senha:</label>
							<input type="password" class="form-control" id="senha" placeholder="***********" value="***********" name="senha" required>
						</div>
						<button type="submit" class="btn btn-primary">Salvar alterações</button>
					</form>
				</div>


			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 text-center mt-4">
				<a class="btn btn-danger" href="restrito.php">Voltar</a>
			</div>
		</div>
	</div>
</body>

</html>