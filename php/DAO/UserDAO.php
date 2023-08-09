<?php
//Add a classe responsavel por fazer a conexao com banco de dados
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelUser.php';

class UserDAO{
    function verifyDuplicateEmail($email){
        $instance = DatabaseConnection::getInstance();
        $conn = $instance->getConnection();
        
        //Veritica se os dados foram preenchidos
        $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
		$statement->bindParam(':email', $email);
        $statement->execute();
        
        $row = $statement->fetch();

        if($row == null){
            return true;
        }else{
            return false;
        }
    }

    //$user é um objeto de usuário, pois o Controller preenche um usuário com o post antes de cadastrá-lo
	function attemptInsertUser($user){		

		try {
			//monto a query
            $sql = "INSERT INTO users (email, name, password) VALUES (:email, :name, :password)";

            //pego uma ref da conexão
			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			//Utilizando Prepared Statements
			$statement = $conn->prepare($sql);

            $statement->bindValue(":email", $user->getEmail());
            $statement->bindValue(":name", $user->getName());
            //O UseModel já aplica o MD5
            $statement->bindValue(":password", $user->getPassword());
            
            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();
        }
    }
}
?>