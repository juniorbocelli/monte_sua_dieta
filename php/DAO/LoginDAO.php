<?php
//Add a classe responsavel por fazer a conexao com banco de dados
include_once $_SESSION["root"] . 'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"] . 'php/Model/ModelUser.php';
class LoginDAO
{
	/**
	 * Verifica se o login existe no banco
	 *
	 * @param uma string contendo o login do usuário
	 *
	 * @return NULL caso login não exista ou Objeto Funcionario populado
	 */
	function verifyLogin($email, $password)
	{

		// pego uma ref da conexão
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		// Faço o select usando prepared statement
		$statement = $conn->prepare("SELECT * FROM user WHERE email = :login AND password = :password");
		$statement->bindParam(':email', $email);
		$statement->bindParam(':password', $password);
		$statement->execute();

		// A linha recebida do banco vem na forma de um array		
		$row = $statement->fetch();

		// Se o login não existir o retorno do banco é nulo
		if ($row == null) {
			return null;
		}

		// Se chegou até aqui é pq o login existe no banco, passo os dados que vieram de banco para o Model correspondente
		$user = new ModelUser();

		// Se existe, chama o método que faz set do funcionário
		$user->setUserFromDatabase($row);

		// Poderia fazer tudo isso dinâmicamente usando a linha de baixo, porém acredito que o passo-a-passo é importante para entender a ideia transferir os dados entre as camadas
		// $funcionario = $statement->fetchAll(PDO::FETCH_CLASS, "ModelFuncionario");
		return $user;
	}
}
