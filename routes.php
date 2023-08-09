<?php

// Quebra a requisição em partes
$requisition = explode('/', $_SERVER['REQUEST_URI']);
// Seleciona a última parte
$action = $requisition[sizeOf($requisition) - 1];
// Separa última parte em alvo e variáveis GETs
$action = explode('?', $action);
// Fica somente com o alvo (as variáveis não serão usadas e nem são bem vindas)
$action = $action[0];

include_once $_SESSION["root"].'php/Controller/ControllerLogin.php';
include_once $_SESSION["root"].'php/Controller/ControllerUser.php';
include_once $_SESSION["root"].'php/Controller/ControllerDieta.php';
include_once $_SESSION["root"].'php/Controller/ControllerAlimento.php';
include_once $_SESSION["root"].'php/Controller/ControllerRefeicao.php';

if($action == '' || $action == 'index'){
    // Mostra a página index
    $titlePage = "Dietas | Home";
    require_once $_SESSION['root']."php/View/ViewIndex.php";

}else if($action == 'login'){
    $titlePage = "Dietas | Login";
    require_once $_SESSION['root']."php/View/ViewLogin.php";
}else if($action == 'cadastrar-alimento'){
    // Formulário que cadastra alimentos
    $titlePage = "Dietas | Cadastrar Alimento";
    require_once $_SESSION['root']."php/View/ViewCadastrarAlimento.php";

}else if($action == 'postCadastraAlimento'){
    //Endpoint que recebe dados para cadastrar alimentos
    $titlePage = "Dietas | Cadastrar Alimento";
    $cAlimento = new ControllerAlimento();
    $cAlimento->createAlimento();

}else if($action == "editar-alimento"){
    // Formulário que administra alimentos
    $titlePage = "Dietas | Administrar Alimentos";
    $cAlimentos = new ControllerAlimento();
    $alimentos = $cAlimentos->getAllAlimentosToEdit();
    require_once $_SESSION['root']."php/View/ViewEditaAlimentos.php";

}else if($action == "postEditarAlimento"){
    // Endpoint que recebe dados para editar alimentos
    $titlePage = "Dietas | Editar Alimento";
    $cAlimento = new ControllerAlimento();
    $cAlimento->editAlimento();

}else if ($action == 'cadastrar-refeicao') {
    // Formulário que cadastra receições
    $titlePage = "Dietas | Cadastrar Refeição";
    $cAlimentos = new ControllerAlimento();
    $alimentos = $cAlimentos->getAllAlimentos();
    $cDietas = new ControllerAlimento();
    $dietas = $cDietas->getAllDietas();
    require_once $_SESSION['root']."php/View/ViewCadastraRefeicao.php";

}else if($action == "postInserirRefeicao"){
    // Endpoint que recebe os dados do formulário de cadastro de refeições
    $titlePage = "Dietas | Cadastrar Refeição";
    $cRefeicao = new ControllerRefeicao;
    $cRefeicao->cadastraRefeicao();

}else if($action == 'dietas'){
    // Exibe dietas cadastradas
    $titlePage = "Dietas | Dieta";
    $cDietas = new ControllerDieta;
    $cDietas->getAllDietas();

}else if ($action == 'cadastrar-dieta') {
    // Formulário que cadastra dieta
    $titlePage = "Dietas | Cadastro de Dietas";
    require_once $_SESSION['root']."php/View/ViewCadastraDieta.php";

}else if ($action == 'postInserirDieta') {
    // Endpoint que recebe os dados do formulário de cadastro de dietas
    $titlePage = "Dietas | Cadastro de Dietas";
    $cDieta = new ControllerDieta;
    $cDieta->insereDieta();

}else if($action == 'register'){
    // Faz cadastro de usuários
    $titlePage = "Dietas | Cadastro";
    require_once $_SESSION['root']."php/View/ViewRegister.php";

}else if ($action == 'postLogin') {
    // Endpoint que verifica login
    $cLogin = new ControllerLogin();
    $cLogin->verifyLogin();

}else if ($action == 'postRegister') {
    // Faz cadastro de usuários
    $cRegister = new ControllerUser();
    $cRegister->insertUser();

}else{
    echo "Página não encontrada!";
}
