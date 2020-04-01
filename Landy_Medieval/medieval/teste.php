<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/farm.js"></script>
  <title>Document</title>
</head>
<body>
<p>Trabalhadores disponíveis<div id='workers' value='5'><img src=imgs/peasant.png id="standby" draggable="true" ondragstart="drag(event)" width="30" height="30"> 5</div></p>
<input type='number' id='quantidade' value='0' min='0' max='5' onchange="muda(this.value)">
</body>
</html>

