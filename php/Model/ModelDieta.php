<?php
class ModelDieta {
    public $id;
    public $user;
    public $name;

    public function setDietaFromDataBase($value){
        $this->setId($value["id"])
        ->setUser($value["user"])
        ->setName($value["name"]);
    }

    public function setDietaFromPOST(){
        $this->setUser($_POST["user"])
               ->setName($_POST["name"]);
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getId(){
        return $this->id;
    }

    public function setUser($user){
        $this->user = $user;
        return $this;
    }

    public function getUser(){
        return $this->user;
    }

    public function setName($name){
        $this->name = $name;
        return $this;
    }

    public function getName(){
        return $this->name;
    }
}
