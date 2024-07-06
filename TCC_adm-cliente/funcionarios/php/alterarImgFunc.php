<?php
include_once "../conexao.php";
include_once "../controleFunc.php";

$cad = new clsFunc($conexao);

if(isset($_POST["Alterar"])) //mudar os nomes das funções
{
    
    $cad->setIdFunc($_POST["idfunc"]);

 //alterar imagem--------------------------------------------------------------------
      


    $ImgAtual = $_FILES["Img"]["name"]; //não definindo quando consulta
    $ImgTemp  = $_FILES["Img"]["tmp_name"]; //não definindo quando consulta
    //comando para pegar na raiz do servidor
    //$Destino  = $_SERVER['DOCUMENT_ROOT'] . '/projeto_tcc_adm_upload_img/funcionarios/imagem/'.$ImgAtual;
    $Destino  ='../imagem/'.$ImgAtual;

    $cad->setImgAtual($ImgAtual);
    $cad->setImgtemp($ImgTemp);
    $cad->setDestino($Destino);

    echo "Temp File: " . $ImgTemp . "<br>";
    echo "Destination: " . $Destino . "<br>";
    echo "Upload Error: " . $_FILES["Img"]["error"] . "<br>";

    if ($_FILES["Img"]["error"] == UPLOAD_ERR_OK) {
        if (move_uploaded_file($ImgTemp, $Destino)) {
            // File moved successfully
        } else {
            // Error moving file
            echo "Failed to move file to destination";
        }
    } else {
        // Handle file upload error
        echo "File upload error: " . $_FILES["Img"]["error"];
    }

//-----------------------------------------------------------------------------------------------------------------
        $dado = $cad->AlterarImg();
        //var_dump($_FILES);
        //var_dump($dado);

        echo $dado;
        echo "<script>javascript:window.location='../index.php';</script>";
}


?>

?>