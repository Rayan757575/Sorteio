<?php
session_start();

if (isset($_POST['submit'])) {

    //conecta com o arquivo que faz a conexão com o banco de dados
    include_once('../adm/conexao.php');

    $sql = "SELECT * FROM participantes;"; //recebe o numero de participantes  
    $command = $pdo->prepare($sql);
    $command->execute();
    $participantes = $command->fetch(PDO::FETCH_ASSOC); // RECEBE O VALOR DAS PESQUISAS

    $quantidadeParticipantes = count($participantes); // recebe a quantidade de participantes
    $NumeroGanhador = rand(1, $quantidadeParticipantes); //recebe o id do ganhador

    //sorteia outro caso já tenha sido sorteado
    $acabou = false;
    do {
        $sql = "SELECT numeros FROM sorteados where $NumeroGanhador = numeros;"; //recebe o nome do proprietário do número sorteado 
        $command = $pdo->prepare($sql);
        $command->execute();

        if ($command -> rowCount() == 1) {
            $NumeroGanhador = rand(1, $quantidadeParticipantes); //recebe o id do ganhador
        } else {
            $acabou = true;
            //insere o numero já sorteado
            $sql = "INSERT INTO sorteados(numeros) VALUES ('$NumeroGanhador');";
            $command = $pdo->prepare($sql);
            $command->execute();
        }
    } while ($acabou == false);

    //pega o Nome do ganhador
    $sql = "SELECT Nome FROM participantes where $NumeroGanhador = ID;";
    $command = $pdo->prepare($sql);
    $command->execute();
    $ganhador = $command->fetch(PDO::FETCH_ASSOC);  // RECEBE O VALOR DAS PESQUISAS

    $_SESSION['msg3'] = "<h2>O ganhador(a) é <strong style = 'color: green'>$ganhador</strong>!</h2>";
    header("Location: ./index.php");
}else{
    echo "Acesso indevido!!!";
}
