<main>
    <div class="div-sorteio">
        <?php
        if (isset($_SESSION['msg3'])) {
            echo $_SESSION['msg3'];
            unset($_SESSION['msg3']);
        }
        ?>
        <form method="POST" action="./processa_sorteio.php">
            <input type="submit" class="btn btn-primary" name="submit" value="Sortear"> <br>
        </form>
    </div>
</main>