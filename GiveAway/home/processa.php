<?php
    session_start();
    if (isset($_POST['submit'])) {
        //conecta com o arquivo que faz a conexão com o banco de dados
        include_once('../adm/conexao.php');

        // recebe o valor do input matricula
        $matricula = $_POST['matricula'];

        //recebe o nome do aluno correspondente a matricula
        $sql = "SELECT nome FROM alunos where '$matricula' = matricula;";
        $command = $pdo->prepare($sql);
        $command->execute();
        $nome_aluno = $command->fetch(PDO::FETCH_ASSOC); // RECEBE O VALOR DAS PESQUISAS

        //verifica se a matricula inserida existe no BD
        if ($nome_aluno > 0) {
            // Converte o resultado para string
            $nome = implode(',', $nome_aluno);

            //consulta para ver se a pessoa já está cadastrada na tabela de participantes
            $sql = "SELECT nome FROM participantes where '$nome' = nome;";
            $command = $pdo->prepare($sql);
            $command->execute();
            $nome_participante = $command->fetch(PDO::FETCH_ASSOC);

            if ($nome_participante > 0) {
                $_SESSION['msg'] = " <p style = 'color:red;'>Você já está cadastrado(a)!<p>";
                header("Location: ./index.php");
            } else {
                //caso não esteja, insere o nome do aluno correspondente a matricula
                $sql = "INSERT INTO participantes(nome) VALUES ('$nome');";
                $command = $pdo->prepare($sql);
                $command->execute();
                header("Location: ./index.php");
            }
        } else {
            $_SESSION['msg'] = " <p style = 'color:red;'>Insira a matricula corretamente<p>";
            header("Location: ./index.php");
        }
    }else{
        echo "acesso indevido!!!";
    }
?>
