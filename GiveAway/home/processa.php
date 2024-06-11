<?php
    session_start();
    //conecta com o arquivo que faz a conexão com o banco de dados
    include_once('../backEnd/conexao.php');

    // recebe o valor do input matricula
    $matricula = $_POST['matricula'];

    //recebe o nome do aluno correspondente a matricula
    $result = mysqli_query($conexao, "SELECT Nome FROM alunos where '$matricula' = Matricula;");    
    $NomeAluno = $result->fetch_All(PDO::FETCH_ASSOC); // RECEBE O VALOR DAS PESQUISAS

    //verifica se a matricula inserida existe no BD
    if(count($NomeAluno) ==  1){
        // Converte o resultado para string
        $nome = $NomeAluno[0][0];

        //consulta para ver se a pessoa já está cadastrada na tabela de participantes
        $result = mysqli_query($conexao, "SELECT Nome FROM participantes where '$nome' = Nome;");    
        $resultado = $result->fetch_All(PDO::FETCH_ASSOC); // RECEBE O VALOR DAS PESQUISAS

        if(count($resultado) > 0){
            $_SESSION['msg'] = " <p style = 'color:red;'>Você já está cadastrado(a)!<p>";
            header("Location: ./index.php"); 
        }else{
            //caso não esteja, insere o nome do aluno correspondente à matricula
            $result = mysqli_query($conexao, "INSERT INTO participantes(Nome) VALUES ('$nome');");
            header("Location: ./index.php"); 
        }  
    }else{
        $_SESSION['msg'] = " <p style = 'color:red;'>Insira a matricula corretamente<p>";
        header("Location: ./index.php"); 
    } 
?>