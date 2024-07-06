<?php

include_once "conexao.php";
include_once "clsPratos.php";

$cad = new clsPratos($conexao);

$Prato          = filter_input(INPUT_POST,"Prato");
$PratoIngr1     = filter_input(INPUT_POST,"PratoIngr1");
$PratoIngr2     = filter_input(INPUT_POST,"PratoIngr2");
$PratoIngr3     = filter_input(INPUT_POST,"PratoIngr3");
$PrecoPrato     = filter_input(INPUT_POST,"PrecoPrato");
$Desconto       = filter_input(INPUT_POST,"desconto");
$ValTot         = $PrecoPrato-($PrecoPrato*($Desconto/100));

if ($PratoIngr2 == null)
{
    $PratoIngr2 = 11;
}

if ($PratoIngr3 == null)
{
    $PratoIngr3 = 11;
}


$cad->setPrato($Prato);
$cad->setPratoIngr1($PratoIngr1);
$cad->setPratoIngr2($PratoIngr2);
$cad->setPratoIngr3($PratoIngr3);
$cad->setPrecoPrato($PrecoPrato);
$cad->setDesconto($Desconto);
$cad->setValTot($ValTot);

//----------------------Registrar--------------------------------------------------------------
        if (isset($_POST["Registrar"]))
        {

//-----------------------upload de imagem------------------------------------------------------------
if ($_FILES["Img"]["error"] == UPLOAD_ERR_OK) {
    // nova imagem upada
    $ImgAtual = $_FILES["Img"]["name"];
    $ImgTemp  = $_FILES["Img"]["tmp_name"];
    $Destino  = 'imagem/'.$ImgAtual;

    $cad->setImgAtual($ImgAtual);
    $cad->setImgTemp($ImgTemp);
    $cad->setDestino($Destino);

    if (move_uploaded_file($ImgTemp, $Destino)) {
        // arquivo movido com sucesso
    } else {
        // Erro ao mover o arquivo
        echo "Failed to move file to destination";
    }
} else {
    // se não tiver imagem a original é mantida
    $ImgAtual = $resultado['img'];
    $cad->setImgAtual($ImgAtual);
}
//--------------------------------------------------------------------------------
 
            echo $cad->Registrar();
            echo "<script>alert('gravado com sucesso');</script>";
            echo "<script>javascript:window.location='index.php';</script>";
        }
  
//----------------------------------Deletar---------------------------------------------------------
        if (isset($_GET["Deletar"]))
        {
            $cad->setIdPrato($_GET["id_prato"]); 
            $dados = $cad->Deletar();
            if($dados == "deletado")
            {
                echo "Deletado com sucesso')";
            }
            else
            {
                echo "Erro: " . $dados;
            }
            exit;
        }
//-------------------------------editar buscando por id--------------------------------------------------------------------

if (isset($_GET["editar"]))
{ 
    
    $cad->setIdPrato($_GET["id_prato"]); 
    $dado = $cad->editar();
    echo json_encode($dado);
}


//--------------------------------ALTERAR------------------------------------------------------------------------
if(isset($_GET["Alterar"])) //mudar os nomes das funções
{
    $cad->setIdPrato($_GET["id_prato"]);
        $dado = $cad->Alterar();
        echo $dado;
        echo "<script>javascript:window.location='index.php';</script>";
}
?>