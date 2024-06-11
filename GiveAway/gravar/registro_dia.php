<?php
    session_start();
    //conecta com o arquivo que faz conexão com o banco de dados
    include_once('conexao.php');

    //recebe os valores dos inputs do nome de usuario, senha e da combo box
    $username = $_POST['nome'];
    $senha = $_POST['senha'];
    $dia = $_POST['dia'];

    //verifica se o nome de ususario e senha estão corretos
    if($username == "IFSULDEMINAS" && $senha == "iF@2023"){

        $result = mysqli_query($conexao, "SELECT Nome FROM $dia;"); 
        $resultado = $result->fetch_All(PDO::FETCH_ASSOC); // RECEBE O VALOR DAS PESQUISAS

        //verifica se o dia já foi cadastrado
        if(count($resultado)> 0){
            $_SESSION['msg3'] = " <p style = 'color:red;'>O dia já contém registros<p>";
            header("Location: gravar.php"); 
        }else{
            //pega todos os participantes cadastrados no dia
            $consulta = mysqli_query($conexao, "SELECT Nome FROM participantes ORDER BY ID;"); 

            //insere o resultado da consulta no bd 
            while ($participantes = mysqli_fetch_assoc($consulta)) {
                $insere = mysqli_query($conexao, "INSERT INTO $dia(Nome) VALUES ('$participantes[Nome]');"); 
            }  
            $_SESSION['msg3'] = " <p style = 'color: rgb(0, 207, 55);;'>Cadastros salvos com sucesso<p>";
            header("Location: ./gravar.php"); 
        }
    }else{
        $_SESSION['msg3'] = " <p style = 'color:red;'>Usuário ou senha incorreto<p>";
        header("Location: ./gravar.php"); 
    }
?>