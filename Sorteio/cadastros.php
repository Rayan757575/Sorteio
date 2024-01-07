<?php
    session_start();

    if(isset($_POST['submit'])){
        //conecta com o arquivo que faz a conexão com o banco de dados
        include_once('conexao.php');

        // recebe o valor do input matricula
        $nome = $_POST['nome'];
        if($nome != ""){
            //recebe o nome do aluno correspondente a matricula
            $result = mysqli_query($conexao, "SELECT Nome FROM participantes where '$nome' = Nome");    
            $NomeJaCadastrado = $result->fetch_All(PDO::FETCH_ASSOC); // RECEBE O VALOR DAS PESQUISAS

            if(count($NomeJaCadastrado) > 0){
                $_SESSION['msg2'] = "<p style = 'color:red;'>Você Já está cadastrado(a)!<p>";
            }else{
                //insere o nome do aluno correspondente à matricula
                $result = mysqli_query($conexao, "INSERT INTO participantes(Nome) VALUES ('$nome');");
                header("Location: logar.php"); 
            }
        }else{
            $_SESSION['msg2'] = "<p style = 'color:red;'>Insira um nome!<p>";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de Participantes</title>
</head>
<body>

    <form method="POST">
        <label >Insira o nome Completo:</label> <br>
        <input type="text" name="nome" >
        <input type="submit" name="submit" value="Enviar"> <br>
        <?php
            if(isset($_SESSION['msg2'])){
                echo $_SESSION['msg2'];
                unset($_SESSION['msg2']);
            }
        ?>
        <a href="logar.php">Página de alunos</a>
    </form>
</body>
</html>
