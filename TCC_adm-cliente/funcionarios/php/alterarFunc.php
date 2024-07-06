<?php
include_once "../conexao.php";
include_once "../controleFunc.php";

$cad = new clsFunc($conexao);

$NmFunc     = filter_input(INPUT_POST,"NmFunc");
$Email      = filter_input(INPUT_POST,"Email");
$Senha      = filter_input(INPUT_POST,"Senha");
$Cpf        = filter_input(INPUT_POST,"Cpf");
$Cargo      = filter_input(INPUT_POST,"Cargo");
$Hier       = filter_input(INPUT_POST,"Hier");

$cad->setNmFunc($NmFunc);
$cad->setEmail($Email);
$cad->setSenha($Senha);
$cad->setCpf($Cpf);
$cad->setCargo($Cargo);
$cad->setHier($Hier);


if(isset($_POST["Alterar"])) //mudar os nomes das funções
{
    
    $cad->setIdFunc($_POST["idfunc"]);

 //alterar imagem movido para alterarImg Func-----------------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------
        $dado = $cad->Alterar();
        //var_dump($_FILES);
        //var_dump($dado);

        echo $dado;
        echo "<script>javascript:window.location='../index.php';</script>";
}


?>