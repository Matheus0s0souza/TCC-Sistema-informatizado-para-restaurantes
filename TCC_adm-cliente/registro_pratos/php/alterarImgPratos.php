<?php
include_once "../conexao.php";
include_once "../controlePratos.php";


$cad->setidPrato($_POST["idPrato"]);

//alterar imagem--------------------------------------------------------------------
     
if(isset($_POST["Alterar"]))
{

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
           // arquivo movido com sucesso
       } else {
           // Erro ao mover o arquivo
           echo "Failed to move file to destination";
       }
   } else {
       // cuidar do erro do update de arquivo
       echo "File upload error: " . $_FILES["Img"]["error"];
   }


$dado = $cad->AlterarImg();
echo $dado;
echo "<script>javascript:window.location='../index.php';</script>";


}
?>