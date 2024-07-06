<?php
include_once "../conexao.php";
include_once "../controlePratos.php";

$cad = new clsPratos($conexao);

$Prato          = filter_input(INPUT_GET,"Prato");
$PratoIngr1     = filter_input(INPUT_GET,"PratoIngr1");
$PratoIngr2     = filter_input(INPUT_GET,"PratoIngr2");
$PratoIngr3     = filter_input(INPUT_GET,"PratoIngr3");
$PrecoPrato     = filter_input(INPUT_GET,"PrecoPrato");
$ValTot         = filter_input(INPUT_GET,"ValTot");

$cad->setPrato($Prato);
$cad->setPratoIngr1($PratoIngr1);
$cad->setPratoIngr2($PratoIngr2);
$cad->setPratoIngr3($PratoIngr3);
$cad->setPrecoPrato($PrecoPrato);
$cad->setValTot($ValTot);

if (isset($_GET["Pesquisar"]))
        {
            $dado = $cad->Consultar();
            if($dado!= null)
            {
                
            echo $dado;
            }
            else 
            {
                echo "nenhum prato encontrado";
            }
        }
?>