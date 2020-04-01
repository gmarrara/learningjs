<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="js/clicks.js"></script>
    <title>Medieval</title>
</head>
<body id="log-flex">

        <div id="login-flex">
            <p class="tit">Portões da Fazenda</p>
            <form action="auth.php" method="post">
            <input class="form" name="user" type="text" placeholder="usuario"><br>
            <input class="form" name="passwd" type="password" placeholder="senha"></br>
            <input id="keep" type="checkbox"> Mantenha-me conectado!</br>
            <button id="entrar">Entrar</button>
            <p id="logtools"><a href="register.php">Novo por aqui?</a> | Esqueceu sua senha?</p>
            </form>
        </div>

</body>
</html>