<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Realizar login </title>

        <link rel="stylesheet" href="css/signin.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">

    </head>
    <body>
        <form class="form-signin" action="verificaLogin.php" method="post">
            <img src="img/logo.png" id="logo" class="logo_index" />
            <h5>Área Restrita</h5>
            <br>
            <label for="inputLogin" class="sr-only">Login </label>
            <input type="text" id="inputLogin" name="txtLogin" class="form-control" placeholder="Informe seu Login" required autofocus>
            <br>
            <label for="inputSenha" class="sr-only">Senha </label>
            <input type="password" id="inputSenha" name="txtPass" class="form-control" placeholder="Informe sua Senha" required>
            <br>
            Cliente novo? Efetue seu cadastro <a href="frmUsuarios.php?new=S">aqui!</a>
            <br><br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>		
    </body>
</html>