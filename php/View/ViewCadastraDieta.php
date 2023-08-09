<?php
$keepLogged = false;
$keepNotLogged = true;
?>

<?php include("includes/header.php"); ?>

</head>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Cadastrar Dieta</h1>
    </div>

    <form id="postInserirDieta" method="POST" action="postInserirDieta">
        <input type="hidden" name="user" value="<?php echo $_SESSION["USER"]["email"]; ?>" >
        <div class="form-row justify-content-md-center">
            <div class="form-group col-6">
                <label for="name">Nome</label>
                <input id="name" type="text" name="name" class="form-control" placeholder="Digite o nome da dieta" required>
            </div>
        </div>

        <div class="form-row justify-content-md-center">
            
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            
        </div>
    </form>


</main>

<?php include("includes/footer.php"); ?>


</body>
</html>