<?php
class AlimentoDAO {
	private $apiKey = "524bc73d8c1dd7c53bb990288b1a8bf5";
	private $prontuario = "3003418";

	/**
	 * Retorna uma lista de objetos se teve sucesso, 0 caso contrário. Só é possível 'pegar' alimentos cadastrados pelo professor ou por você
	 */
	public function getAllAlimentos(){
		$url = "http://ramos-api.herokuapp.com/alimentos?pront={$this->prontuario}&key={$this->apiKey}";
		$ch = curl_init($url);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                                                                    
		$result = curl_exec($ch);
		return $result;
	}
	/**
	 * Retorna um objeto se teve sucesso, 0 caso contrário. Só é possível 'pegar' alimentos cadastrados pelo professor ou por você
	 */
	public function getAlimentoById($id){
		$url = "http://ramos-api.herokuapp.com/alimentos?id={$id}&pront={$this->prontuario}&key={$this->apiKey}";
		$ch = curl_init($url);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                                                                    
		$result = curl_exec($ch);
		return $result;
	}
	/**
	 * Retorna o id criado se teve sucesso, 0 caso contrário.
	 */
	public function createAlimento(){
		$url = "http://ramos-api.herokuapp.com/alimentos?pront={$this->prontuario}&key={$this->apiKey}";
		$data = array(
			"nome" => "{$_POST['nome']}",
			"calorias" => "{$_POST['Calorias']}",
			"proteinas" => "{$_POST['Proteinas']}",
			"carboidratos" => "{$_POST['Carboidratos']}",
			"gorduras" => "{$_POST['Gorduras']}",
			"fibra" => "{$_POST['Fibra']}",
			"umidade" => "{$_POST['umidade']}",
		);
		$payLoad = json_encode($data);
		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_HEADER, false); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payLoad); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($payLoad))
		);   
	
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
  
	}
  
	/**
	 * Retorna 1 se teve sucesso, 0 caso contrário. Só é possível editar alimentos que você mesmo cadastrou
	 */

	public function editAlimento(){
		$url = "http://ramos-api.herokuapp.com/alimentos?pront={$this->prontuario}&key={$this->apiKey}";
		$data = array(
			"id" => "{$_POST['id']}",
			"nome" => "{$_POST['nome']}",
			"calorias" => "{$_POST['Calorias']}",
			"proteinas" => "{$_POST['Proteinas']}",
			"carboidratos" => "{$_POST['Carboidratos']}",
			"gorduras" => "{$_POST['Gorduras']}",
			"fibra" => "{$_POST['Fibra']}",
			"umidade" => "{$_POST['umidade']}",
		);
		$payLoad = json_encode($data);
		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); 
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_HEADER, false); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payLoad); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($payLoad))
		);   
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
  
	}
  
	/**
	 * Retorna 1 se teve sucesso, 0 caso contrário. Só é possível excluir alimentos que você mesmo cadastrou
	 */
	public function deleteAlimento(){
		$url = "http://ramos-api.herokuapp.com/alimentos?pront={$this->prontuario}&key={$this->apiKey}";
		
		$data = array(
			"id" => "{$_POST['id']}"
		);
		$payLoad = json_encode($data);

		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_HEADER, false); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payLoad); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($payLoad))
		);   
	
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
		
	}
  
  }
