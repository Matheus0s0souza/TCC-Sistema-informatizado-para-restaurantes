<?php
include_once "../conexao.php";
include_once "../controlePratos.php";

$cad = new clsPratos($conexao);


$Prato          = filter_input(INPUT_POST,"Prato");
$PratoIngr1     = filter_input(INPUT_POST,"PratoIngr1");
$PratoIngr2     = filter_input(INPUT_POST,"PratoIngr2");
$PratoIngr3     = filter_input(INPUT_POST,"PratoIngr3");
$PrecoPrato     = filter_input(INPUT_POST,"PrecoPrato");
$Desconto       = filter_input(INPUT_POST,"desconto");
$ValTot         = $PrecoPrato-($PrecoPrato*($Desconto/100));


$cad->setPrato($Prato);
$cad->setPratoIngr1($PratoIngr1);
$cad->setPratoIngr2($PratoIngr2);
$cad->setPratoIngr3($PratoIngr3);
$cad->setPrecoPrato($PrecoPrato);
$cad->setDesconto($Desconto);
$cad->setValTot($ValTot);

if(isset($_POST["Alterar"])) //mudar os nomes das funções
{
    
    $cad->setidPrato($_POST["idPrato"]);

        $dado = $cad->Alterar();


        echo $dado;
        echo "<script>javascript:window.location='../index.php';</script>";
}


?>