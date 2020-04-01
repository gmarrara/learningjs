<!DOCTYPE html>
<html lang="pt-BR">
<?php 
include_once("db.php");
session_start();
$user = $_SESSION['user'];
$array = file_get_contents("json/".$user.".json");
$json = json_decode($array,true);
$farm = $json['farms']['farm1'];
$title=$json['title'];
$gps=$json['farms']['location'];

$sql = "SELECT *, u.id as uid, f.id as fid FROM user u INNER JOIN farm f ON u.id = f.dono WHERE u.nick='$user'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0){
    while($row=mysqli_fetch_assoc($result)){
      $userID=$row["uid"];//Identificação do usuário
      $farmID=$row["fid"];//Identificação da Fazenda
	  $wealth=$row["wealth"];//riqueza jogador
    }
}
?>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/farm2.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/farm.js"></script>
    <title>Medieval Farm</title>
</head>

<body onload="market(5,15)">
    <main>
        <section>
            <div class="item" id="climate">
                <script type="text/javascript">weather("<?php echo($gps);?>")</script>
                <div id="locale"><?php echo $farm ?></div>
                <div id="icon"></div>
                <div id="cast"></div>
                <div id="descrip"></div>
                <div id="temp"></div>
                <div id="wind"></div>
                <div id="humid"></div>
            </div>


            <h2>Informações do Jogador</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto ipsam rem totam neque animi nostrum eum, nemo, impedit odio rerum tempora aliquam veniam blanditiis commodi, eius expedita necessitatibus in itaque ex? Velit rerum quia quas.</p>
            <section id="player">
                <div  id="owner">
                    <?php
                    echo ("Jogador: ".$title." ".$user."   | Patrimônio: ".$wealth."<br />");
                    ?>
					<span>Celeiro: Madeira:<span id="lenha" class="barn">0 </span>| Minério:<span id="minei"  class="barn">0 </span>  | Peixes:<span id="pesca"  class="barn">0 </span>| Colheita:<span id="colhe"  class="barn">0 </span>| Plantio:<span id="plant"  class="barn">0 </span>| Alimentação:<span id="alime" class="barn"> 0</span></span>
                </div>
            </section>
        </section>
        <aside>
            <h2>Posses</h2>
            <div  id="produtos">
                <table>
                    <tr><td> Produto: </td><td> Quantidade: </td></tr>
                    <?php
                    $sql = "SELECT * FROM posse WHERE user= $userID AND farm= $farmID";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0){
                        while($row=mysqli_fetch_assoc($result)){
                    ?>
                        <tr><td><?php echo $row["produto"] ?></td><td><?php echo $row["quantidade"] ?></td></tr>    
                    <?php
                        }   
                    }
                    ?>
                </table>
            </div>

            <div class="item" id ="mercado" >
                <span id="pec" onclick="mostrar('pecuaria')">Pecuária </span> | <span id="agr" onclick="mostrar('agricultura')">Agricultura</span><br /><br />
                <div id="pecuaria">
                    <select  name="tipo" id="tipo" onchange="ativa(this.value)">
                        <option selected value="0">Que animal deseja negociar?</option>
                        <option value="porco">Porcos</option>
                        <option value="cabra">Cabras</option>
                        <option value="galinha">Galinhas</option>
                        <option value="boi">bois</option>
                        <options value="vaca">Vacas</option>
                    </select>
                </div>
                <div id="agricultura">
                    <select  name="tipo" id="tipo" onchange="ativa(this.value)">
                        <option selected value="0">Que plantio deseja negociar?</option>
                        <option value="milho"     >Milho</option>
                        <option value="cenoura"   >Cenoura</option>
                        <option value="batata"    >Batata</option>
                        <option value="spice"     >Especiarias</option>
                    </select>
                </div>

                <input  type="range" min="-30" max="30" id="quantidade" value="0" oninput="quanta(this.value)" onchange="pass(this.value)" disabled><br />
                <label  for="quantidade" id="qtd">0</label>            
            </div>
        </aside>
            <section>
                <h1>Trabalhadores </h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis fugit sed commodi maiores eaque cupiditate itaque vero quam eum obcaecati, inventore odit architecto provident autem praesentium nostrum? Libero rem id molestiae ex, enim, impedit harum adipisci obcaecati quod commodi autem.</p>
                <section>
                <img src="imgs/peasant.png" width="30" height="30"><div  id="ocioso" value="5" > 5</div>
				
				<span>Plantio por hora (Kg):<span><span id="plan">0</span>&nbsp;&nbsp;&nbsp;
				<span>Colheita por hora (Kg):<span><span id="colh">0</span>&nbsp;&nbsp;&nbsp;
				<span>alimentação por hora (Kg):<span><span id="alim">0</span><br />
				<span>Minério por hora (Kg):<span><span id="mine">0</span>&nbsp;&nbsp;&nbsp;
				<span>lenhas por hora (Kg):<span><span id="lenh">0</span>&nbsp;&nbsp;&nbsp;
				<span>peixes por hora (Kg):<span><span id="pesc">0</span>&nbsp;&nbsp;&nbsp;
				
                </section>
                <section id="works">
                    <input type='number' class='work' id='plantar'   value='0' min='0' max='5' onchange="muda(this.value, this.id)">Plantar
                    <input type='number' class='work' id='colher'    value='0' min='0' max='5' onchange="muda(this.value, this.id)">Colher
                    <input type='number' class='work' id='alimentar' value='0' min='0' max='5' onchange="muda(this.value, this.id)">Alimentar
                    <input type='number' class='work' id='mineirar'  value='0' min='0' max='5' onchange="muda(this.value, this.id)">Mineirar
                    <input type='number' class='work' id='lenhar'    value='0' min='0' max='5' onchange="muda(this.value, this.id)">Lenhar
                    <input type='number' class='work' id='pescar'    value='0' min='0' max='5' onchange="muda(this.value, this.id)">Pescar
                </section>
            </section>
        <aside>
            <h2>Mercado</h2>
            <div class="item" id="prices">
                <span id="ani" onclick="mostrar('animal')">Pecuária </span> | <span id="pla" onclick="mostrar('plantacao')">Agricultura</span><br /><br />
                <table id="animal">
                    <tr><td>Valor do porco:</td>
                    <td id="porco"></td></tr>
                    <tr><td>Valor da cabra:</td>
                    <td id="cabra"></td></tr>
                    <tr><td>Valor da galinha:</td>
                    <td id="galinha"></td></tr>
                    <tr><td>Valor do boi:</td>
                    <td id="boi"></td></tr>
                </table>

                <table id="plantacao">
                    <tr><td>Valor do milho:</td>
                    <td id="milho"></td></tr>
                    <tr><td>Valor da cenoura:</td>
                    <td id="cenoura"></td></tr>
                    <tr><td>Valor da batata:</td>
                    <td id="batata"></td></tr>
                    <tr><td>Valor das especiarias:</td>
                    <td id="spice"></td></tr>
                </table>
            </div>
        </aside>
    </main>
</body>
</html>

<!-- Função para enviar dados ao DB sem necessidade Refresh -->
<script>
function pass(qtd) {
    var kind = document.getElementById('tipo').value
    var price = document.getElementById(kind).innerHTML
    $.ajax({
      type:'POST',
      dataType:'text',
      url:'incluibens.php',
      data:{quantidade:qtd, tipo:kind, preco:price},
      success: function (msg){
        $("#produtos").html(msg);
      }
    });
  }
</script>