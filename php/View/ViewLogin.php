<?php
$keepLogged = false;
$keepNotLogged = false;
?>

<?php include("includes/header.php"); ?>

</head>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">

    <div class="container">
        <h1 class="mt-5">Login</h1>

        <form action="postLogin" class="form-signin" method="POST">
            <div class="form-row justify-content-md-center">
                <div class="form-group col-4">
                    <label for="email">E-mail</label>
                    <input id="email" type="email" name="email" value="<?php if(isset($_SESSION['flash'])) echo $_SESSION['flash']['email'] ?>" class="form-control" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
                    <small id="emailHelp" class="form-text text-muted">Digite um e-mail válido.</small>
                </div>
            </div>

            <div class="form-row justify-content-md-center">
                <div class="form-group col-4">
                    <label for="password">Senha</label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Digite sua senha">
                </div>
            </div>

            <div class="form-row justify-content-md-center">
                <div class="form-group col-4">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
            </div>
        </form>
    </div>

</main>

<?php include("includes/footer.php"); ?>


</body>
</html>