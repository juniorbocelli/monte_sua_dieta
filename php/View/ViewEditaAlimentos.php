<?php
$keepLogged = false;
$keepNotLogged = true;
?>

<?php include("includes/header.php"); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Edita Alimentos Cadastrados</h1>
    </div>
</main>



<section id="form2" style="margin-top:150px; margin-bottom:150px; padding:25px; border:1px solid black; border-radius: 25px;">
    <h2 style="margin-left:50px; margin-bottom:50px;">Encontrar Alimento para Editar</h2>
    <form class="form-horizontal" action="postEditarAlimento" method="POST">
        <div class="form-group">
            <div class="col-sm-10">
                <input type="text" class="form-control dadosColetados" id="buscar" name="buscar" placeholder="Digite o nome de um alimento (pelo menos 3 caracteres)">
            </div>
        </div>

        <div id="esconder">
            <div class="form-group">
                <label class="control-label col-sm-2" for="id">Id:</label>
                <div class="col-sm-10">
                    <input readonly type="text" class="form-control dadosColetados" id="id" name="id">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="nome">Nome:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control dadosColetados" id="nome" name="nome">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="Calorias">Calorias:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control dadosColetados" id="Calorias" name="Calorias">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="Proteinas">Proteinas:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control dadosColetados" id="Proteinas" name="Proteinas">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="Carboidratos">Carboidratos:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control dadosColetados" id="Carboidratos" name="Carboidratos">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="Gorduras">Gorduras:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control dadosColetados" id="Gorduras" name="Gorduras">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="Fibra">Fibra:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control dadosColetados" id="Fibra" name="Fibra">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="umidade">Umidade:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control dadosColetados" id="umidade" name="umidade">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" value="editar" name="editar">Editar</button>
                </div>
            </div>
        </div>
    </form>
</section>



<?php // include("includes/footer.php"); 
?>

<script>
    // passo todos os alimentos do PHP para o JS
    le t alimentosJS = <?php echo $alimentos; ?>;

    // ==== Autocomplete: https://jqueryui.com/autocomplete/#default
    $(document).ready(function() {
        // pego apenas os nomes de todos os alimentos. (Tem como trabalhar de outras formas com o autoComplete, porém considero essa mais fácil de entender)
        let alimentosNomes = []
        for (i = 0; i < alimentosJS.length; i++) {
            alimentosNomes.push(alimentosJS[i].nome)
        }

        $("#buscar").autocomplete({
            minLength: 3, // só começa a procurar depois que digitou 2 caracteres
            source: alimentosNomes,
            select: function(event, selecionado) {
                populaForm(selecionado.item.value)
                return false;
            }
        });


        $("#calcular").click(function() {
            proteina = parseFloat($("#prot").val())
            carbo = parseFloat($("#carbo").val())
            gordura = parseFloat($("#gordu").val())
            fibra = parseFloat($("#fib").val())
            $("#kcal").val(proteina * 4 + carbo * 4 + gordura * 9)
            $("#umi").val(100 - (proteina + carbo + gordura + fibra))
            $("#calcular").hide()
            $("#criar").show()
        });
    });

    function populaForm(nomeAlimento) {
        $("#esconder").show(350);
        $("#buscar").val(nomeAlimento);
        // Encontra o Primeiro alimento que tenha esse nome (do jeito que está não funciona com nome repetido)
        for (i = 0; i < alimentosJS.length; i++) {
            if (alimentosJS[i].nome == nomeAlimento) {
                console.log(alimentosJS[i])
                $("#id").val(alimentosJS[i].id);
                $("#nome").val(alimentosJS[i].nome);
                $("#Calorias").val(alimentosJS[i].kcal_calculada);
                $("#Proteinas").val(alimentosJS[i].proteinas);
                $("#Carboidratos").val(alimentosJS[i].carboidratos);
                $("#Gorduras").val(alimentosJS[i].lipidios);
                $("#Fibra").val(alimentosJS[i].fibra);
                $("#umidade").val(alimentosJS[i].umidade);
                return;
            }
        }
    }
</script>
<script>
    function calcularDados() {
        alert("The paragraph was clicked.");
    }
</script>

</body>

</html>