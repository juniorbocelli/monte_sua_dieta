<?php
$keepLogged = false;
$keepNotLogged = true;
?>

<?php include("includes/header.php"); ?>

</head>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Cadastrar Refeição</h1>
    </div>

    <form id="postInserirRefeicao" method="POST" action="postInserirRefeicao">
        <div class="form-row justify-content-md-center">
            <div class="form-group col-6">
                <label for="name">Nome</label>
                <input id="name" type="text" name="name" class="form-control" placeholder="Digite o nome da refeição" required>
            </div>
        </div>

        <div class="form-row justify-content-md-center">
            <div class="form-group col-6">
                <label for="dietasCadastradas">Escolha a dieta</label>
                <select class="form-control" id="dieta" required>

                    <option>Selecione uma dieta...</option>
                    <?php
                    foreach ($dietas as $key => $value) {
                        echo '<option value="' . $dietas[$key]->id . '">' . $dietas[$key]->name . '</option>';
                    }
                    ?>

                </select>
            </div>
        </div>

        <div class="form-row justify-content-md-center">
            <div class="form-group col-6">
                <label>Escolha os Alimentos</label>
                <select name="alimento[]" class="form-control" multiple required>
                    <?php

                    foreach ($alimentos as $key => $value) {
                        echo '<option value="' . $alimentos[$key]->id . '">' . $alimentos[$key]->nome . ' - ' . $alimentos[$key]->kcal_calculada . ' Kcal</option>';
                    }
                    ?>

                </select>
            </div>
        </div>

        <div class="form-row justify-content-md-center">

            <button type="submit" class="btn btn-primary">Cadastrar</button>

        </div>
    </form>


</main>

<?php include("includes/footer.php"); ?>

<script>
</script>


</body>

</html>