<?php
$keepLogged = false;
$keepNotLogged = true;
?>

<?php include("includes/header.php"); ?>

</head>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Dietas Cadastradas</h1>
        <?php if (isset($dietas) && $dietas == null) : ?>
            <p>Você ainda não tem dietas cadastradas!</p>
        <?php else : ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($dietas)) {
                        foreach ($dietas as $value) {
                            echo '<tr>';
                            echo '<th scope="row">' . $value->getId() . '</th>';
                            echo '<td><a href=ViewEditarDieta?=id"' . $value->getName() . '</a></td>';
                            echo '<td><a href=excluir?=id"' . $value->getId() . '">Excluir</a></td>';
                            echo '</tr>';
                        }
                    }

                    ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</main>

<?php include("includes/footer.php"); ?>


</body>

</html>