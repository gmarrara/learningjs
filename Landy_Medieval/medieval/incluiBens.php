<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/farm2.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <title>Medieval Farm</title>
</head>
<?php
include_once("db.php");
session_start();
$user = $_SESSION['user'];
$array = file_get_contents("json/".$user.".json");
$json = json_decode($array,true);
$farm = $json['farms']['farm1'];

$quantidade = $_POST['quantidade'];
$tipo = $_POST['tipo'];
$valor = $_POST['preco'];

$custo = $quantidade * $valor;

$sql = "SELECT *, u.id as uid, f.id as fid FROM user u INNER JOIN farm f ON u.id = f.dono WHERE u.nick='$user'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0){
    while($row=mysqli_fetch_assoc($result)){
        $saldo=$row["wealth"]; //Saldo total de riquezas do usuário
        
        //Código para vendas de produtos - Verifica se o usuario tem recursos para serem vendidos e adiciona o valor da venda as riquezas e reduz a quantidade de produto
        If ($quantidade < 0){//Define se existe uma compra ou uma venda de procutos de acordo com a quantidade
            $userID=$row["uid"];//Identificação do usuário
            $farmID=$row["fid"];//Identificação da Fazenda

            $sql = "SELECT * FROM posse WHERE produto = '$tipo'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0){//Verifica se o jogador tem recursos disponíveis para venda
                while($row=mysqli_fetch_assoc($result)){
                    if ($quantidade <= $row["quantidade"]){//Verifica se a quantidade que o jogador possui é suficiente para venda
                        $qtd=$row["quantidade"] + $quantidade;
                        $recursos = $saldo - $custo;
                        $sql = "UPDATE user SET wealth = $recursos WHERE ID = $userID";
                        mysqli_query($con, $sql);

                        $sql="UPDATE posse SET quantidade = $qtd WHERE user = $userID AND farm = $farmID AND produto = '$tipo'";
                        mysqli_query($con, $sql);

                        //echo '<script>alert("Venda de '.abs($quantidade).' '.$tipo.' por '.abs($custo),' moedas, efetuada com sucesso!!"); </script>';
                        $validate= 1;
                    }else{echo ("Você não tem $tipo suficientes para realizar essa venda!");}
                }

            }else{echo ("Você não tem $tipo suficientes para realizar essa venda!");}

        }else{//Segunda condição para decidir compra ou venda de posses

            //Código para compras de produtos - Verifica se há saldo e deduz das riquezas o valor da compra !!! FALTA ATUALIZAR o que ja tiver ao invés de criar novo REGISTRO
            if ($saldo >= $custo){//Verifica se há saldo para compra
                $userID=$row["uid"];//Identificação do usuário
                $farmID=$row["fid"];//Identificação da Fazenda

                //incluir verificação de existencia do produto, se sim UPDATE, se nao INSERT
                $sql = "SELECT * FROM posse WHERE produto = '$tipo'";
                
                $result = mysqli_query($con, $sql);
            
                if (mysqli_num_rows($result) > 0){ //Se já houver o produto no DB é atualizado
                    while($row=mysqli_fetch_assoc($result)){
                        $qtd=$row["quantidade"];
                        $vlr=$row["valor"];
                        $totalq = $quantidade + $qtd;
                        //calcular valor médio após compra
                        $valorm = ($vlr+$valor)/2;
                    }
                    $sql = "UPDATE posse SET quantidade = $totalq, valor = $valorm WHERE produto = '$tipo'";
                    mysqli_query($con, $sql);
                }else{//Se o Jogador ainda não tiver o produto ele é incluido
                    $sql="INSERT INTO posse (user, farm, produto, quantidade, valor) VALUES ($userID, $farmID, '$tipo', $quantidade, $valor)";
                }
                if (mysqli_query($con, $sql)){
                   
                   // echo '<script>alert("Compra de '.$quantidade.' '.$tipo.' por '.$custo,' moedas, efetuada com sucesso!!"); </script>';
                    $validate= 1;
                    $saldo = $saldo - $custo;
                    $sql = "UPDATE user SET wealth = $saldo WHERE ID = $userID";//Atualização da riqueza total do jogador, deduzindo a compra
                    mysqli_query($con, $sql);
                }else{
                    echo ("Erro ao gravar os dados: ".mysqli_error($con));
                }

            }else{echo ("Você não tem riquezas suficiêntes para comprar!");}
        }   
    }
}
if ($validade = 1){
	header("Refresh:0; url=farm2.php");
?>
    <table>
    <tr><td> Produto: </td><td> Quantidade: </td></tr>
<?php
$sql = "SELECT * FROM user WHERE ID = $userID";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0 ){
	While ($row = mysqli_fetch_assoc($result)){
        $wealth = $row["wealth"];
        $title = $row["title"];
        echo("<script>document.getElementById('owner').innerHTML ='Player: $title $user | Patrimônio: $wealth'</script> ");
	}
}

$sql = "SELECT * FROM posse WHERE user= $userID AND farm= $farmID";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0){
  while($row=mysqli_fetch_assoc($result)){  
?>
    <tr><td><?php echo $row["produto"]; ?></td><td><?php echo $row["quantidade"]; ?></td></tr>    
<?php
  }   
}
}
?>
</table>
</div>