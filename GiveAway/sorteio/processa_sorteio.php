<?php
    session_start();
    //conecta com o arquivo que faz a conexão com o banco de dados
    include_once('../backEnd/conexao.php');

    //recebe o nome dos participantes dos 5 dias
    $result = mysqli_query($conexao, "SELECT Nome FROM participantes");

    /*
        //insere o resultado da consulta no bd 
        while ($participantes = mysqli_fetch_assoc($result)) {
            $insere = mysqli_query($conexao, "INSERT INTO premiados(Nome) VALUES ('$participantes[Nome]');"); 
        } 
    */

    if(isset($_POST['submit'])){

        //echo "<body style='background-image: url(confetti-4.gif)'> </body>";

        $result = mysqli_query($conexao, "SELECT * FROM participantes;");//recebe o numero de participantes  
        $participantes = $result->fetch_All(PDO::FETCH_ASSOC); // RECEBE O VALOR DAS PESQUISAS

        $quantidadeParticipantes = count($participantes); // recebe a quantidade de participantes
        $NumeroGanhador = rand(1, $quantidadeParticipantes);//recebe o id do ganhador

        //sorteia outro caso já tenha sido sorteado
        $acabou = false;
        do {
            //teste para ver se já foi sorteado
            $result = mysqli_query($conexao, "SELECT numeros FROM sorteados where $NumeroGanhador = numeros;");
            $resultado = $result->fetch_All(PDO::FETCH_ASSOC); // RECEBE O VALOR DAS PESQUISAS

            if(count($resultado) > 0){
                $NumeroGanhador = rand(1, $quantidadeParticipantes); //recebe o id do ganhador
            }else{
                $acabou = true;
                //insere o numero já sorteado
                $result = mysqli_query($conexao, "INSERT INTO sorteados(numeros) VALUES ('$NumeroGanhador');");
            }
        } while ($acabou == false);

        //pega o Nome do ganhador
        $result = mysqli_query($conexao, "SELECT Nome FROM participantes where $NumeroGanhador = ID;"); 
        $ganhador = $result->fetch_All(PDO::FETCH_ASSOC); // RECEBE O VALOR DAS PESQUISAS
        $ganhador = $ganhador[0][0];

        $_SESSION['msg3'] = "<h2>O ganhador(a) é <strong style = 'color: green'>$ganhador</strong>!</h2>";
        header("Location: ./index.php"); 
    }

?>