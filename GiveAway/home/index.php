<?php
    session_start();   
    //conecta com o arquivo que faz a conexão com o banco de dados
    include_once('../backEnd/conexao.php'); 

    //consulta todos os participantes para a criaçã de lista
    $result = mysqli_query($conexao, "SELECT * FROM participantes ORDER BY ID DESC");  
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
<body>
    <main>
        <!-- formulário de cadastros dos alunos na lista de presença-->
        <div class="div-form ">
            <img  width="17%"src="../imagens/IFSULDEMINAS-aplicações-horizontais.png" >
            <form method="POST" action="./processa.php" enctype="multipart/form-data">
                <label >Insira a matricula:</label>
                <input type="text" name="matricula" id="campo" autocomplete="off" required >
                <input type="submit" class="btn btn-primary" value="Enviar"> <br>
                <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
            </form>
        </div>
        <!-- Tabela de pessoas já cadastradas -->
        <div class="table-wrapper">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scape="col">ID</th>
                        <th scape="col">Nome</th>
                    </tr>
                </thead>
                <?php
                    //lista todas as pessoas cadastradas colocando cada uma como um item da tabela
                    while ($user = mysqli_fetch_assoc($result)) {
                        echo "<tr>";  
                        echo "<td>".$user['ID']."</td>";
                        echo "<td>".$user['Nome']."</td> <br>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </main>
</body>
<script src="../scripts/script.js"></script>
</html>