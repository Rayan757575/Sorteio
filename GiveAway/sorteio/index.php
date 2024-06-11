<?php
    session_start();   
    //conecta com o arquivo que faz a conexão com o banco de dados
    include_once('../backEnd/conexao.php'); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Sorteio</title>
</head>
<body>
    <div class="div-h1">
        <h1>SORTEIO DE BRINDES</h1>
    </div>
    <div class="div-sorteio">
        <?php
            if(isset($_SESSION['msg3'])){
                echo $_SESSION['msg3'];
                unset($_SESSION['msg3']);
            }
        ?>
        <form method="POST" action="./processa_sorteio.php">
            <input type="submit" class="btn btn-primary" name="submit" value="Sortear"> <br>
        </form>
    </div>
        
    <!-- Tabela de pessoas já cadastradas -->
    <div class="table-wrapper2">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scape="col">ID</th>
                    <th scape="col">Nome</th>
                </tr>
            </thead>
            <?php
                $result2 = mysqli_query($conexao, "SELECT * FROM participantes ORDER BY ID;");  
                //lista todas as pessoas cadastradas colocando cada uma como um item da tabela
                while ($user = mysqli_fetch_assoc($result2)) {
                    echo "<tr>";  
                    echo "<td>".$user['ID']."</td>";
                    echo "<td>".$user['Nome']."</td> <br>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
    </div>
</body>
</html>