//realiza a conexão com o bd
<?php
    $dbHost = 'localhost';
    $dbUserName = 'root';
    $dbPassoword = '';
    $dbName = 'escola';
    
    $conexao = new mysqli($dbHost, $dbUserName, $dbPassoword , $dbName);
   
?>
