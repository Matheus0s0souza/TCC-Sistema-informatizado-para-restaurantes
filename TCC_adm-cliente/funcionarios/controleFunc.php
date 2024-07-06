<?php
//define('BASE_PATH', __DIR__);
include_once "conexao.php";
include_once "clsFunc.php";

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

//----------------------------Registrar--------------------------------------------------------------

        if (isset($_POST["Registrar"]))
        {

//-----------------------upload de imagem------------------------------------------------------------
        $ImgAtual = $_FILES["Img"]["name"]; //não definindo quando consulta
        $ImgTemp  = $_FILES["Img"]["tmp_name"]; //não definindo quando consulta
        $Destino  = 'imagem/'.$ImgAtual;

        $cad->setImgAtual($ImgAtual);
        $cad->setImgtemp($ImgTemp);
        $cad->setDestino($Destino);

        if ($_FILES["Img"]["error"] == UPLOAD_ERR_OK) { //não definindo quando consulta
        move_uploaded_file($ImgTemp, $Destino);
        }
        else {
        // Handle file upload erro
        $error_code = $_FILES["Img"]["error"];
        }
//-----------------------------------------------------------------------------------------------------
            echo $cad->Registrar();
            echo "<script>alert('gravado com sucesso');</script>";
            echo "<script>javascript:window.location='index.php';</script>";
        }
//-----------------------funcao para editar buscando por id------------------------------------


        if (isset($_GET["editar"]))
        {
            $cad->setIdFunc($_GET["id_func"]); 
            $dado = $cad->editar();
            echo $dado;
        }


//--------------------------------ALTERAR movido para outro diretorio------------------------------------------------------------------
/*
if(isset($_GET["Alterar"])) //mudar os nomes das funções
{
    $cad->setIdFunc($_POST["id_prato"]);

 //alterar imagem--------------------------------------------------------------------
      


    $ImgAtual = $_FILES["Img"]["name"]; //não definindo quando consulta
    $ImgTemp  = $_FILES["Img"]["tmp_name"]; //não definindo quando consulta
    $Destino  = 'imagem/'.$ImgAtual;

    $cad->setImgAtual($ImgAtual);
    $cad->setImgtemp($ImgTemp);
    $cad->setDestino($Destino);

    if ($_FILES["Img"]["error"] == UPLOAD_ERR_OK) { //não definindo quando consulta
    move_uploaded_file($ImgTemp, $Destino);
    }
    else {
    // Handle file upload erro
    $error_code = $_FILES["Img"]["error"];
    }

//-----------------------------------------------------------------------------------------------------------------
        $dado = $cad->Alterar();

        echo $dado;
        echo "<script>javascript:window.location='index.php';</script>";
}
*/
//----------------------------Deletar---------------------------------------------------------------

        if (isset($_GET["Deletar"]))
{
    $cad->setIdFunc($_GET["id_func"]); 
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

//----------------------------------------------------------------------------------------------------

?>