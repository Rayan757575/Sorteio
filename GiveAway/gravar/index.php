<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Registrar</title>
</head>
<body>
    <main>
        <form method="POST" action="registro_dia.php" enctype="multipart/form-data">
            <label><h1>Login</h1></label><hr>
            <input id="campo" type="text" name="nome" placeholder="Nome" required autocomplete="off"> 
            <input type="password" name="senha" placeholder="Senha" required autocomplete="off">
            <select name="dia">
                <option value="dia1">Dia 1</option>
                <option value="dia2">Dia 2</option>
                <option value="dia3">Dia 3</option>
                <option value="dia4">Dia 4</option>
                <option value="dia5">Dia 5</option>
            </select><br><br>
            <button class="btn btn-primary">Enviar</button>
        </form> <br>
            <?php
                if(isset($_SESSION['msg3'])){
                    echo $_SESSION['msg3'];
                    unset($_SESSION['msg3']);
                }
            ?>
    </main>
</body>
</html>