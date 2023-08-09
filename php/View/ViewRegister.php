<?php
$keepLogged = true;
$keepNotLogged = false;
?>

<?php include("includes/header.php"); ?>

</head>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mt-5">Cadastro</h1>
            </div>
        </div>

        <form id="formRegister" method="POST" action="postRegister">
            <div class="form-row justify-content-md-center">
                <div class="form-group col-6">
                    <label for="name">Nome</label>
                    <input id="name" type="text" name="name" value="<?php if(isset($_SESSION['flash'])) echo $_SESSION['flash']['name'] ?>" class="form-control" placeholder="Digite seu nome">
                </div>
            </div>

            <div class="form-row justify-content-md-center">
                <div class="form-group col-6">
                    <label for="email">E-mail</label>
                    <input id="email" type="email" name="email" value="<?php if(isset($_SESSION['flash'])) echo $_SESSION['flash']['email'] ?>" class="form-control" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
                    <small id="emailHelp" class="form-text text-muted">Digite um e-mail válido.</small>
                </div>
            </div>

            <div class="form-row justify-content-md-center">
                <div class="form-group col-6">
                    <label for="password">Senha</label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Digite sua senha">
                </div>
            </div>

            <div class="form-row justify-content-md-center">
                
                <button type="submit" class="btn btn-primary">Cadastrar</button>
               
            </div>
        </form>
        
    </div>
</main>

<?php include("includes/footer.php"); ?>

</body>
</html>