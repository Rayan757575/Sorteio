<!-- Tabela de pessoas já cadastradas -->
<div class="table-wrapper">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scape="col">ID</th>
                <th scape="col">Nome</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($pessoas = $command->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $pessoas['id']; ?> </td>
                    <td><?php echo $pessoas['nome']; ?> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>