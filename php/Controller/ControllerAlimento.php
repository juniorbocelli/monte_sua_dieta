<?php

include_once $_SESSION["root"].'php/DAO/AlimentoDAO.php';
include_once $_SESSION["root"].'php/DAO/DietaDAO.php';
include_once $_SESSION["root"].'php/Model/ModelDieta.php';

class ControllerAlimento {
    function getAllDietas(){
        $DietaDAO = new DietaDAO();
        $dietas=$DietaDAO->getAllDietas();

        return $dietas;
    }

    function getAllAlimentos(){
        $alimentosDAO = new AlimentoDAO();
        $alimentos=$alimentosDAO->getAllAlimentos();
        
        $alimentos = json_decode($alimentos);
        return $alimentos;
    }

    function createAlimento(){
        $alimentoDAO = new AlimentoDAO();

        if($alimentoDAO->createAlimento() == 0){
            $_SESSION["flash"]["msg"] = "Não foi possível cadastrar.";
            $_SESSION["flash"]["success"] = false;
            
            include_once $_SESSION["root"].'php/View/ViewCadastrarAlimento.php';
        }else{
            $_SESSION["flash"]["msg"] = "Alimento cadastrado com sucesso.";
            $_SESSION["flash"]["success"] = true;
            
            include_once $_SESSION["root"].'php/View/ViewCadastrarAlimento.php';
        }
    }

    function getAllAlimentosToEdit(){
        $alimentosDAO = new AlimentoDAO();
        $alimentos=$alimentosDAO->getAllAlimentos();
        
        return $alimentos;
    }

    function editAlimento(){
        $alimentoDAO = new AlimentoDAO();

        if($alimentoDAO->editAlimento() == 0){
            $_SESSION["flash"]["msg"] = "Não foi possível editar.";
            $_SESSION["flash"]["success"] = false;
            
            include_once $_SESSION["root"].'php/View/ViewEditaAlimentos.php';
        }else{
            $_SESSION["flash"]["msg"] = "Alimento editado com sucesso.";
            $_SESSION["flash"]["success"] = true;
            
            include_once $_SESSION["root"].'php/View/ViewEditaAlimentos.php';
        }
    }
}
