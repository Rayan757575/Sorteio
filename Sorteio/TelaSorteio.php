<?php
    session_start();

    if(isset($_POST['submit'])){
        //conecta com o arquivo que faz a conexão com o banco de dados
        include_once('conexao.php');

        //
        $result = mysqli_query($conexao, "SELECT * FROM participantes;");//recebe o numero de participantes  
        $participantes = $result->fetch_All(PDO::FETCH_ASSOC); // RECEBE O VALOR DAS PESQUISAS

        $quantidadeP = count($participantes); // recebe a quantidade de participantes
        $NumeroGanhador = rand(1, $quantidadeP);//recebe o id do ganhador

        //sorteia outro caso já tenha sido sorteado
        $acabou = false;
        do {
            //teste para ver se já foi sorteado
            $result = mysqli_query($conexao, "SELECT numeros FROM sorteados where $NumeroGanhador = numeros;");
            $resultado = $result->fetch_All(PDO::FETCH_ASSOC); // RECEBE O VALOR DAS PESQUISAS

            if(count($resultado) > 0){
                $NumeroGanhador = rand(1, $quantidadeP); //recebe o id do ganhador
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

        $_SESSION['msg3'] = "<p style = 'color:green;'>O ganhador(a) é<br>$NumeroGanhador, $ganhador<p>";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sorteio</title>
</head>
<body>
    <form method="POST">
        <input type="submit" name="submit" value="Sortear"> <br>
        <?php
            if(isset($_SESSION['msg3'])){
                echo $_SESSION['msg3'];
                unset($_SESSION['msg3']);
            }
        ?>
    </form>
</body>
</html>