<?php include_once("db.php"); //Carrega DB

$user = ucfirst($_POST["user"]);
$passwd = $_POST["passwd"];

if (!empty($user) && !empty($passwd)){//Verifica se campos estão preenchidos
    $sql = "SELECT * FROM user WHERE nick='$user' and passwd=md5('$passwd')";
    $result = Mysqli_query($con, $sql);
    
    if (mysqli_num_rows($result) > 0){//verifica no DB se jogador existe e se autenticação está correta
        session_start();
        $_SESSION['user'] = $user; //Cria sessão do jogador
        
        header("location: https://hexagonti.com.br/medieval/farm2.php");
    }else{
        echo($sql.'</br>Usuário ou senha inválidos!');
    }
}else{
    header("location:https://hexagonti.com.br/medieval/index.php?ale=2");
}
?>
