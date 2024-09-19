<main>
    <!-- formulário de cadastros dos alunos na lista de presença-->
    <div class="div-form ">
        <form method="POST" action="./processa.php" enctype="multipart/form-data">
            <label>Insira a matricula:</label>
            <input type="text" name="matricula" id="campo" autocomplete="off" placeholder="Matricula" required>
            <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
        </form>
    </div>
    <script src="scripts/script.js"></script>
</main>