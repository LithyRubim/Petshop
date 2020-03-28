<?php
	require_once("model/conexao.class.php");

	$parametro = "";

	$mensagem = "Não foi possível retornar a informação";

	if (isset($_GET['id_noticia'])) {		
		$noticias = new Crud("noticias");
		$filtro = array("id_noticia" => $_GET['id_noticia']);
		$resposta = $noticias->selectCrud("*", true, $filtro);
		$parametro = "?id_noticia=" . $resposta[0]->id_noticia . "&confirmar";
		$mensagem = "Deseja excluir a notícia " . $resposta[0]->titulo . "?";

		if (isset($_GET['confirmar'])) {
			$resposta = $noticias->excluiCrud($filtro);
			if ($resposta)
				header("Location: restrito.php?excluido=true");
			else
				header("Location: restrito.php?excluido=false");
		}
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Excluir usuário</title>
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
				<h2><?php echo $mensagem; ?></h2>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 mt-4">
				<a class="btn btn-danger" href="<?php echo $parametro; ?>">Confirmar</a>
				<a class="btn btn-secondary" href="restrito.php">Cancelar</a>
			</div>
		</div>
	</div>
</body>
</html>
