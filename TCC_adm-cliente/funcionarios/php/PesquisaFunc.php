<?php
include_once "../conexao.php";
include_once "../controleFunc.php";

$cad = new clsFunc($conexao);

$NmFunc     = filter_input(INPUT_GET,"NmFunc");
$Email      = filter_input(INPUT_GET,"Email");
$Cpf        = filter_input(INPUT_GET,"Cpf");

// setta os valores do formulario
$cad->setNmFunc($NmFunc);
$cad->setEmail($Email);
$cad->setCpf($Cpf);

// faz a pesquisa
if (isset($_GET["Pesquisar"])) {
    $dado = $cad->Consultar();
    echo $dado;
    exit;
}

?>
