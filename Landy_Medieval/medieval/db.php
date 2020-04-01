<?php
    $con = mysqli_connect('medieval.mysql.dbaas.com.br', 'medieval', 'Vale3141', 'medieval');
    if (!$con){
        echo('Conexão com o banco de dados falhou verifique o erro:'.mysqli_error($con));
    }
?>