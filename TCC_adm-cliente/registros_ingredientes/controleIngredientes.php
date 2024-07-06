<?php
//define('BASE_PATH', __DIR__);
include_once "conexao.php";
include_once "clsIngredientes.php";

$cad = new clsIngredientes($conexao);

$ingre      = filter_input(INPUT_GET,"ingre"); //   $_GET["ingre"];
$gramas     = filter_input(INPUT_GET,"gramas");  //  $_GET["gramas"];
$descricao  = filter_input(INPUT_GET,"descricao");  // $_GET["descricao"];

$cad->setingre($ingre);
$cad->setgramas($gramas);
$cad->setdescricao($descricao);


//----------------------------REGISTRAR-----------------------------------------------------------------------
        if (isset($_GET["Registrar"]))
        {
            echo $cad->Registrar();
            echo "<script>javascript:window.location='index.php';</script>";
        }

//----------------------------------PESQUISAR-------------------------------------------------------------------

        if (isset($_GET["Pesquisar"]))
        {

            $dado = $cad->Consultar();
            echo $dado;
        }

//------------------------------------DELETAR------------------------------------------------------------------

        if (isset($_GET["Deletar"]))
{
    $cad->setIdIngre($_GET["id_ingr"]); 
    $dados = $cad->Deletar();
    if($dados == "deletado")
    {
        echo "Deletado com sucesso";
    }
    else
    {
        echo "Erro: " . $dados;
    }
    //exit;
}
//-------------------------------editar--------------------------------------------------------------------

if (isset($_GET["editar"])) //mudar os nomes das funções
{
    
    $cad->setIdIngre($_GET["id_ingr"]); 
    $dado = $cad->editar();
    echo json_encode($dado);
}


//--------------------------------ALTERAR------------------------------------------------------------------------
if(isset($_GET["Alterar"])) //mudar os nomes das funções
{
    $cad->setIdIngre($_GET["id_ingr"]);
        $dado = $cad->Alterar();
        echo $dado;
        echo "<script>javascript:window.location='index.php';</script>";
}
?>