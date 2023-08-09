<?php
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelDieta.php';

class DietaDAO{

    function verifyDuplicateName($name){
        $instance = DatabaseConnection::getInstance();
        $conn = $instance->getConnection();
        
        //Veritica se os dados foram preenchidos
        $statement = $conn->prepare("SELECT * FROM diets WHERE name = :name");
		$statement->bindParam(':name', $name);
        $statement->execute();
        
        $row = $statement->fetch();

        if($row == null){
            return true;
        }else{
            return false;
        }
    }

    function attemptInsertDieta($dieta){		

		try {
			//monto a query
            $sql = "INSERT INTO diets (user, name) VALUES (:user, :name)";

            //pego uma ref da conexão
			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			//Utilizando Prepared Statements
			$statement = $conn->prepare($sql);

            $statement->bindValue(":user", $dieta->getUser());
            $statement->bindValue(":name", $dieta->getName());
            
            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();
        }
    }

    function getAllDietas(){	

        //pego uma ref da conexão
        $instance = DatabaseConnection::getInstance();
        $conn = $instance->getConnection();
    
        //Faço o select usando prepared statement
        $statement = $conn->prepare("SELECT * FROM diets");		
        $statement->execute();
    
        //linhas recebe todas as tuplas retornadas do banco		
        $linhas = $statement->fetchAll();
    
        //Verifico se houve algum retorno, senão retorno null
        if(count($linhas)==0)
                return null;
    
        //Var que irá armazenar um array de obj do tipo funcionário
        $dietas;		
    
        foreach ($linhas as $value) {
            $dieta = new ModelDieta();
            $dieta->setDietaFromDataBase($value);			
            $dietas[]=$dieta;
        }	
        return $dietas;
    }
}
?>