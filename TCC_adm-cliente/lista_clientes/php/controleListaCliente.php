<?php
include_once "conexao.php";

$NmCliente     = filter_input(INPUT_GET,"NmCliente");
$Email      = filter_input(INPUT_GET,"Email");
$Cpf        = filter_input(INPUT_GET,"Cpf");
$tel        = filter_input(INPUT_GET,"tel");
$ende        = filter_input(INPUT_GET,"ende");

/*
// setta os valores do formulario
$cad->setNmFunc($NmFunc);
$cad->setEmail($Email);
$cad->setCpf($Cpf);
*/


// faz a pesquisa
if (isset($_GET["Pesquisar"])) {
    try
    {
        $comando=$conexao->prepare("SELECT * FROM login WHERE nome = ? or email = ? or cpf = ? or tel = ? or ende = ?;");
        $comando->bindParam(1,$NmCliente);
        $comando->bindParam(2,$Email);
        $comando->bindParam(3,$Cpf);
        $comando->bindParam(4,$tel);
        $comando->bindParam(5,$ende);

        if($comando->execute())
        {
            if($comando->rowCount()>0)
            {
                $Tabela     = $comando->fetchAll(PDO::FETCH_ASSOC);
                $retorno    = json_encode($Tabela);

            }
            else
            {
                $retorno= "nenhum funcionario encontrado";
            }
        }
    }
    catch(PDOException $erro)
    {
        $retorno = "Erro ".$erro-> getMessage();
    }
    echo $retorno;
    exit;
}


?>