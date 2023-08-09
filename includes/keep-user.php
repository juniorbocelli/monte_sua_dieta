<?php
/*
$_SESSION["USER"]["logged"] = true;
$_SESSION["USER"]["name"] = $user->getName();
$_SESSION["USER"]["email"] = $user->getEmail();
*/
class KeepUser{
    public static function HowToKeep($keepLogged, $keepNotLogged){
        if($keepNotLogged && !$keepLogged){
            //Só aceita usuários logados
            if(!isset($_SESSION["USER"]["logged"]) || !$_SESSION["USER"]["logged"]){
                unset($_SESSION["USER"]);
                header("Location: login");
            }
        }elseif(!$keepNotLogged && $keepLogged){
            //Só aceita usuários não logados
            if(isset($_SESSION["USER"]["logged"]) && $_SESSION["USER"]["logged"]){
                header("Location: index");
            }
        }elseif($keepNotLogged && $keepLogged){
            //Aceita ambos
        }
    }
}
?>