<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medieval</title>
</head>

<?php include_once("db.php");
    if (!empty($_POST["add"])){
    
        //Informações do jogador
        $name = $_POST["name"];
        $nick = $_POST["nick"];
        $mail = $_POST["email"];
        $gender = $_POST["sex"];
        $birth = $_POST["birth"];
        $passwd= $_POST["passwd"];
        $title = "Peasent";
        $wealth = 30;

        //Informações da cidade
        $farm = $_POST["farm"];
        $region = $_POST["region"];
        $model = $_POST["model"];
        $gps = $_POST["gps"];
        $value = "150";
        $size = "0.5";

        $usr = "INSERT INTO user ( nome, nick, title, wealth, birth,email,passwd, gender)
        VALUES ('$name', '$nick', '$title', $wealth, '$birth', '$mail',MD5('$passwd'), '$gender')";
        if (mysqli_query($con, $usr)){
            echo ("</br>Benvindo sr ".$nick."!</br>");
        }else{
            echo ("Erro ao gravar os dados: ".mysqli_error($con));
        }

        $settle = "INSERT INTO farm(dono, city, model, region, valor, size, gps)
        VALUES ('$nick','$farm', '$model', '$region', $value, $size, '$gps') ";
        
        if (mysqli_query($con, $settle)){
            echo ("A cidade de".$farm." foi fundada! Parabés!!</br>");

            $json = 'json/'.$nick.'.json';
            if (file_exists($json)){
                echo ('Este usuário já possui uma ou mais cidades, refaça o cadastro');
            }else{
                $player = ['nome' => $name,
               'nick' => $nick,
               'title' => $title,
               'wealth' => $wealth,
               'farms' => ['farm1' => $farm,
                           'region' =>$region,
                           'valor' => $value,
                           'size' => $size,
                           'location' => $gps
                          ]#Fecha array farms
                          ]; #Fecha array player

                $fn = fopen($json, "w+" );
                $player_json = json_encode($player);
                $grava = fwrite($fn, $player_json);
                fclose($fn);
            }
        }else{
            echo ("Erro ao gravar os dados da sua cidade: ".mysqli_error($con));
        }

    }

?>

<body>
</body>
</html>