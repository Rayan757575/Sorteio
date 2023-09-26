<?php
    session_start();    
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    
    <form method="POST" action="processa.php">
        <label >Insira a matricula:</label> <br>
        <input type="text" name="matricula" >
        <input type="submit" value="Enviar"> <br>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <a href="outros.php" >Não é aluno? Clique aqui</a> <br>
    </form>
</body>

</html>