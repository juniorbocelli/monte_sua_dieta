<?php

/**
 * Arquivo que pega url 
 */

session_start();

// Já que o .htaccess manda o usuário para a raiz sempre, podemos pegar o caminho apenas uma vez
$_SESSION['root'] = 'C:/xampp2/htdocs/monte-sua-dieta/';

// Agora que já temos o root, podemos usar esse valor para determinar o caminho relativo de cada arquivo
include $_SESSION['root'] . "routes.php";
