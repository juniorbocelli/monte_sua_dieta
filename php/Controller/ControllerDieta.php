<?php

include_once $_SESSION["root"] . 'php/DAO/DietaDAO.php';
include_once $_SESSION["root"] . 'php/Model/ModelDieta.php';

class ControllerDieta
{

	function getAllDietas()
	{
		$DietaDAO = new DietaDAO();
		$dietas = $DietaDAO->getAllDietas();
		include_once $_SESSION["root"] . 'php/View/ViewExibeDietas.php';
	}

	function insereDieta()
	{
		$dietaDAO = new DietaDAO();
		$dieta = new ModelDieta();

		// Verifica se o nome já existe
		if ($dietaDAO->verifyDuplicateName($_POST['name'])) {

			$dieta->setDietaFromPOST();

			$resultadoInsercao = $dietaDAO->attemptInsertDieta($dieta);
		} else {
			$_SESSION["flash"]["msg"] = "O nome informado já foi cadastrado anteriormente.";
			$_SESSION["flash"]["success"] = false;

			include_once $_SESSION["root"] . 'php/View/ViewExibeDietas.php';

			$resultadoInsercao = false;
		}

		if ($resultadoInsercao) {
			$_SESSION["flash"]["msg"] = "Dieta cadastrada com Sucesso.";
			$_SESSION["flash"]["success"] = true;

			include_once $_SESSION["root"] . 'php/View/ViewExibeDietas.php';
		} else {
			$_SESSION["flash"]["msg"] = "Não foi possível cadastrar.";
			$_SESSION["flash"]["success"] = false;

			include_once $_SESSION["root"] . 'php/View/ViewExibeDietas.php';
		}
	}
}
