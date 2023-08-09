<?php

include_once $_SESSION["root"].'php/DAO/UserDAO.php';
include_once $_SESSION["root"].'php/Model/ModelUser.php';

class ControllerUser {

	function insertUser(){
		$userDAO = new UserDAO();
        $user = new ModelUser();
        
        //Verifica se o e-mail já existe no banco
        if($userDAO->verifyDuplicateEmail($_POST['email'])){
			//echo $_POST['email']." ".$_POST['name']." ".$_POST['password'];
			$user->setUserFromPOST();
			//echo var_dump($user);
			//echo $user->getEmail();
		    $resultadoInsercao = $userDAO->attemptInsertUser($user);
        }else{
            $_SESSION["flash"]["msg"] = "O e-mail informado já foi cadastrado anteriormente.";
			$_SESSION["flash"]["success"] = false;
			$_SESSION["flash"]["email"] = $_POST['email'];
            $_SESSION["flash"]["name"] = $_POST['name'];
            
			include_once $_SESSION["root"].'php/View/ViewRegister.php';
			
			$resultadoInsercao = false;
        }
			
		if($resultadoInsercao){
			$_SESSION["flash"]["msg"] = "Funcionário Cadastrado com Sucesso.";
			$_SESSION["flash"]["success"] = true;
			$_SESSION["USER"]["logged"] = true;
			$_SESSION["USER"]["name"] = $user->getName();
			$_SESSION["USER"]["email"] = $user->getEmail();

            include_once $_SESSION["root"].'php/View/ViewExibeDietas.php';
		}
		else{
			$_SESSION["flash"]["msg"] = "Não foi possível cadastrar.";
			$_SESSION["flash"]["success"] = false;	
			$_SESSION["flash"]["email"] = $user->getEmail();
            $_SESSION["flash"]["name"] = $user->getName();
            
            include_once $_SESSION["root"].'php/View/ViewRegister.php';
		}
	}
}