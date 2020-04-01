<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <script src="js/clicks.js"></script>
    <script src="js/weather.js"></script>
    <script type="text/javascript">watherBalloon()</script>
    <title>Medieval</title>
</head>
<body id="log-flex">
    <div id="login-flex">
        <form action="created.php" method="post">
        <!-- Dados do jogador -->
        <p class="tit">Identifique-se meu senhor</p>
        <input class="form" type="text" name="name" placeholder="Digite seu nome"><br>
        <input class="form" type="text" name="nick" placeholder="Digite seu apelido"><br>
        <input id="dat" name="birth" class="form" type="date">
        <br>
        
        <select class="form" name="sex" id="sex">
            <option selected>Selecione gênero</option>
            <option value="F">Feminino</option>
            <option value="M">Masculino</option>
            <option value="X">Outros</option>
        </select>
        <br>
        <input id="mail" class="form" name="email" type="email" placeholder="Digite seu email"><br>
        <input class="form" name="passwd" type="password" placeholder="Digite sua senha"><br>
        <input class="form" name="passwd_conf" type="password" placeholder="Confirme sua senha"><br>

        <!--Criação da fazenda -->
        <p class="tit">Crie suas terras</p>
        <input class="form" type="text" name="farm" id="farm" placeholder="Nome da sua fazenda"><br>
        <div>Caso queira selecionar outra cidade é só digitar no campo abaixo:</div><br>
        <input class="form2" type="text" name="gps" id="gps" onblur="tempo(this.value)"><br>

        <select class="form" name="region" id="region">
        <option selected>Qual região deseja?</option>
            <option value="montanhas">Montanhas</option>
            <option value="pastagens">Pastagens</option>
            <option value="lagos">Lagos</option>
            <option value="flarestas">Florestas</option>
            <options value="rios">Rios</option>
        </select>  
        <br>
        <select class="form" name="model" id="model">
            <option selected>Qual o tipo de fazenda?</option>
            <option value="pecuaria">Pecuária</option>
            <option value="agricultura">Agricultura</option>
            <option value="pesca">Pesca</option>
            <option value="caça">Caça</option>
            <option value="auto">Auto-sustentável</option>
        </select>
        <br>
        <button id="create" name="add" value="add">Criar Fazenda</button>
        </form>
    </div>  
    <div id="weather">
        <p class="tit">Clima atual</p>
        <div id="icon"></div>
        <p id="location"></p>
        <p id="description"></p>
        <p id="cover"></p>
        <p id="temp"></p>
        <p id="humid"></p>
        <p id="wind"></p>
    </div>
</body>
</html>