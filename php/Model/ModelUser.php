<?php
class ModelUser {

	public $name;
	public $email; 
	public $password;

    /**
     * Popula um obj funcionario com os dados vindos da tabela funcionario. Funciona como um construtor
     *
     * @param um array com dados da tupla proveniente do DB, em que o nome do atributo na entidade é o mesmo do atributo no objeto
     *
     * @return não há retorno.
     */
    public function setUserFromDatabase($row){
        $this->setEmail($row["email"])
            ->setName($row["name"])
            ->setPassword($row['password']);
    }

    /**
     * Popula um obj funcionario com os dados vindos do formuário de cadastro. Funciona como um construtor
     *
     * @return não há retorno.
     */
    function setUserFromPOST(){
        $this->setEmail($_POST['email'])
            ->setName($_POST['name'])
            ->setPassword(md5($_POST['password']));
    }

    /**
     * Gets the value of nome.
     *
     * @return mixed
     */
     public function getEmail()
     {
         return $this->email;
     }
 
     /**
      * Sets the value of nome.
      *
      * @param mixed $nome the nome
      *
      * @return self
      */
     public function setEmail($email)
     {
         $this->email = $email;

         return $this;
     }

    /**
     * Gets the value of idFuncionario.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of idFuncionario.
     *
     * @param mixed $idFuncionario the id funcionario
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of senha.
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets the value of senha.
     *
     * @param mixed $senha the senha
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = md5($password);

        return $this;
    }
}