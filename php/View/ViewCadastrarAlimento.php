<?php
$keepLogged = false;
$keepNotLogged = true;
?>

<?php include("includes/header.php"); ?>

</head>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Cadastro de Alimento</h1>
    </div>
</main>



<section id="form1" style="margin-top:150px; margin-bottom:150px; padding:25px; border:1px solid black; border-radius: 25px;">
    <h2 style="margin-left:50px; margin-bottom:50px;">Cadastrar novo alimento na porção de 100g</h2>
    <form class="form-horizontal" action="postCadastraAlimento" method="POST">
        <div class="row">
            <div class="col-sm-5">
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nome">Nome:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control dadosColetados" name="nome">
                    </div>
                </div>       
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Proteinas">Proteinas:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control dadosColetados" id="prot" name="Proteinas">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Carboidratos">Carboidratos:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control dadosColetados" id="carbo" name="Carboidratos">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Gorduras">Gorduras:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control dadosColetados" id="gordu" name="Gorduras">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Fibra">Fibra:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control dadosColetados" id="fib" name="Fibra">
                    </div>
                </div>                            
            </div>
            <div class="col-sm-5">

                <div class="form-group">
                    <label class="control-label col-sm-2" for="umidade">Umidade:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control dadosColetados" id="umi" name="umidade" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="Calorias">Calorias:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control dadosColetados" id="kcal" name="Calorias" readonly >
                    </div>
                </div>
            <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" class="btn btn-primary" value="calcular" name="calcular" id="calcular">Calcular</button>
                    <button type="submit" class="btn btn-primary" value="criar" name="criar" id="criar" style="display:none">Cadastrar Novo</button>
                </div>
            </div>
            </div>
        </div>
        
    </form>
</section>





<?php include("includes/footer.php"); ?>

<script>
$("#calcular").click(function(){
        proteina = parseFloat($("#prot").val() )
        carbo = parseFloat($("#carbo").val() )
        gordura = parseFloat($("#gordu").val() )
        fibra = parseFloat($("#fib").val() )
        $("#kcal").val( proteina*4+carbo*4+gordura*9)
        $("#umi").val( 100-(proteina+carbo+gordura+fibra))
        $("#calcular").hide()
        $("#criar").show()
});
</script>

</body>
</html>