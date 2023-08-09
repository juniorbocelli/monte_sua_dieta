<?php

include_once $_SESSION["root"].'php/DAO/LoginDAO.php';
include_once $_SESSION["root"].'php/Model/ModelUser.php';

class ControllerLogin {
	function verifyLogin(){
		//verifico se a requisição que chegou nessa pagina é POST
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			//recebo as variaveis por POST
			$email = $_POST["email"];
			$password = $_POST["password"];	
			
			$loginDAO = new LoginDAO();
			$user = new ModelUser();	
			//Retorna um funcionario ou retorna NULL;
			$user = $loginDAO->verifyLogin($email, $password);

			if ($user!=NULL) {
				$_SESSION["USER"]["logged"] = true;
				$_SESSION["USER"]["name"] = $user->getName();
				$_SESSION["USER"]["email"] = $user->getEmail();
				//Coloquei na sessão que o usuário está logado e o seu nome.
				//Mando a página para a rota "exibeFuncionario"
				header("Location:dietas");
			}
			else{
				$_SESSION["flash"]["email"] = $email;
				$_SESSION["flash"]["msg"] = "Usuário ou senha não conferem";
				$_SESSION["flash"]["success"] = false;
				//Coloquei na sessão "temporária" os avisos e feedbacks necessários, chamo a rota Login	
				header("Location:login");
			}
		}
	}
}