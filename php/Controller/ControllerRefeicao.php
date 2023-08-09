<?php
class ControllerRefeicao {
    function cadastraRefeicao(){
        $cRefeicao = new RefeicaoDAO;
        $idMeal = $cRefeicao->cadastraRefeicao($_POST['dieta'], $_POST['name']);

        foreach ($_POST["alimento"] as $alimento) {
            $cRefeicao->cadastraAlimentos($idMeal, $alimento);
        }

        require_once $_SESSION['root']."php/View/ViewCadastraRefeicao.php";
    }
}
