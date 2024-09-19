<?php
    session_start();
    //conecta com o arquivo que faz a conexão com o banco de dados
    include_once('../adm/conexao.php');

    //consulta todos os participantes para a criação da lista
    $sql = "SELECT * FROM participantes ORDER BY ID DESC";
    $command = $pdo->prepare($sql);
    $command->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
</head>

<main>
    <div class="image">
        <img width="17%" src="../imagens/IFSULDEMINAS-aplicações-horizontais.png">
    </div>
</main>