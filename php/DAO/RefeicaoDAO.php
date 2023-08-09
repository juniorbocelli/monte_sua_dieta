<?php
class RefeicaoDao {
    function cadastraRefeicao($diet, $name){
        try {
			//monto a query
            $sql = "INSERT INTO meals (diet, name) VALUES (:diet, :name) RETURNING id";

            //pego uma ref da conexão
			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			//Utilizando Prepared Statements
			$statement = $conn->prepare($sql);

            $statement->bindValue(":diet", $diet);
            $statement->bindValue(":name", $name);
            
            $statement->execute();

            return $statement->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();
        }
    }

    function cadastraAlimentos($meals, $food){
        try {
			//monto a query
            $sql = "INSERT INTO assign_foods_and_meals (meals, food) VALUES (:meals, :food)";

            //pego uma ref da conexão
			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			//Utilizando Prepared Statements
			$statement = $conn->prepare($sql);

            $statement->bindValue(":meals", $meals);
            $statement->bindValue(":food", $food);
            
            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();
        }
    }
}
?>