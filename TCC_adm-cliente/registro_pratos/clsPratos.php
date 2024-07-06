<?php
class clsPratos{

private $idPrato;   
private $Prato;     
private $PratoIngr1;
private $PratoIngr2;
private $PratoIngr3;
private $PrecoPrato;

//valores novos para inserir---------------------------------------
private $Desconto;
private $ValTot;  

//imagem-----------------------------------------------------------
private $ImgAtual;
private $ImgTemp;
private $Destino;

//---------------------conexao-------------------------------------
private $conexao; // conexao com o database

public function __construct($conexao) { 
    $this->conexao = $conexao;
}

//--------------------id prato------------------------------------
public function getidPrato()
{
    return $this->idPrato;
}
public function setidPrato($Ip)
{
    $this->idPrato = $Ip;
}

//---------------------prato-----------------------------------
public function getPrato()
{
    return $this->Prato;
}
public function setPrato($Pt)
{
    $this->Prato = $Pt;
}

//-----------------------prato ingrediente 1---------------------------------

public function getPratoIngr1()
{
    return $this->PratoIngr1;
}
public function setPratoIngr1($Pi1)
{
    $this->PratoIngr1 = $Pi1;
}
//-------------------------prato ingrediente 2-------------------------------

public function getPratoIngr2()
{
    return $this->PratoIngr2;
}
public function setPratoIngr2($Pi2)
{
    $this->PratoIngr2 = $Pi2;
}

//------------------------prato ingrediente 3--------------------------------

public function getPratoIngr3()
{
    return $this->PratoIngr3;
}
public function setPratoIngr3($Pi3)
{
    $this->PratoIngr3 = $Pi3;
}
//--------------------------preco prato------------------------------

public function getPrecoPrato()
{
    return $this->PrecoPrato;
}
public function setPrecoPrato($Pp)
{
    $this->PrecoPrato = $Pp;
}
//--------------------------desconto------------------------------

public function getDesconto()
{
    return $this->Desconto;
}
public function setDesconto($Desc)
{
    $this->Desconto = $Desc;
}

//--------------------------desconto------------------------------

public function getValTot()
{
    return $this->ValTot;
}
public function setValTot($VlTt)
{
    $this->ValTot = $VlTt;
}

//-----------------------Imagem Atual------------------------------------------------------------
public function getImgAtual()
{
    return $this->ImgAtual;
}
public function setImgAtual($Ima)
{
    $this->ImgAtual = $Ima;
}


//-----------------------Imagem temporaria---------------------------------------------------------

public function getImgTemp()
{
    return $this->ImgTemp;
}
public function setImgTemp($Imt)
{
    $this->ImgTemp = $Imt;
}

//-----------------------Destino-------------------------------------------------------------------

public function getDestino()
{
    return $this->Destino;
}
public function setDestino($Des)
{
    $this->Destino = $Des;
}



//------------------registro------------------------------

public function Registrar()
{

    //include "conexao.php";
    try{
        $comando=$this->conexao->prepare("insert into tb_pratos (nm_prato, prato_ingr_1, prato_ingr_2,prato_ingr_3,preco_prato,desconto,val_tot,img) values (?,?,?,?,?,?,?,?)");
        $comando->bindParam(1,$this->Prato);
        $comando->bindParam(2,$this->PratoIngr1);
        $comando->bindParam(3,$this->PratoIngr2);
        $comando->bindParam(4,$this->PratoIngr3);
        $comando->bindParam(5,$this->PrecoPrato);
        $comando->bindParam(6,$this->Desconto);
        $comando->bindParam(7,$this->ValTot);
        $comando->bindParam(8,$this->ImgAtual);

        if($comando->execute())
        {
            $retorno= "gravado com sucesso";
        }
    }
    catch(PDOException $erro)
    {
        $retorno = "Erro ".$erro-> getMessage();
    }
    return $retorno;
}



//---------------------------verificar--------------------------------------------
public function Consultar()
{
    try
    {
        // metodo de pesquisa com  o comando sql
        $query = "SELECT tb_pratos.*, 
                         GROUP_CONCAT(ingr1.nm_ingr SEPARATOR ', ') AS ingredient_names_1,
                         GROUP_CONCAT(ingr2.nm_ingr SEPARATOR ', ') AS ingredient_names_2,
                         GROUP_CONCAT(ingr3.nm_ingr SEPARATOR ', ') AS ingredient_names_3
                  FROM tb_pratos 
                  LEFT JOIN tb_ingredientes AS ingr1 ON tb_pratos.prato_ingr_1 = ingr1.id_ingr 
                  LEFT JOIN tb_ingredientes AS ingr2 ON tb_pratos.prato_ingr_2 = ingr2.id_ingr 
                  LEFT JOIN tb_ingredientes AS ingr3 ON tb_pratos.prato_ingr_3 = ingr3.id_ingr 
                  WHERE tb_pratos.nm_prato = ? 
                     OR tb_pratos.prato_ingr_1 = ? 
                     OR tb_pratos.prato_ingr_2 = ? 
                     OR tb_pratos.prato_ingr_3 = ? 
                     OR tb_pratos.preco_prato = ? 
                     OR tb_pratos.val_tot = ? 
                  GROUP BY tb_pratos.id_prato";

        $comando = $this->conexao->prepare($query);
        $comando->bindParam(1, $this->Prato);
        $comando->bindParam(2, $this->PratoIngr1);
        $comando->bindParam(3, $this->PratoIngr2);
        $comando->bindParam(4, $this->PratoIngr3);
        $comando->bindParam(5, $this->PrecoPrato);
        $comando->bindParam(6, $this->ValTot);
        
        if ($comando->execute())
        {
            if ($comando->rowCount() > 0)
            {
                $Tabela = $comando->fetchAll(PDO::FETCH_ASSOC);
                $retorno = json_encode($Tabela);
            }
            else
            {
                $retorno = "Nenhum prato encontrado";
            }
        }
    }
    catch(PDOException $erro)
    {
        $retorno = "Erro ".$erro->getMessage();
    }
    return $retorno;
}

//---------------------------- Deletar ------------------------------------------

public function Deletar() {
    try {
        $comando = $this->conexao->prepare("DELETE FROM tb_pratos WHERE id_prato = ?");
        $comando->bindParam(1, $this->idPrato);

        if ($comando->execute()) 
        {
            $retorno = "deletado";
        } 
    } 
    catch (PDOException $erro) 
    {
        $retorno = $erro->getMessage();
    }
    return $retorno;
}
//-------------------------------------PEGAR POR ID PARA ALTERACAO-----------------------------------------------
public function editar() //mudar os nomes das funções
{
    try {
        $comando = $this->conexao->prepare("SELECT * FROM tb_pratos WHERE id_prato = ?");
        $comando->bindParam(1, $this->idPrato);

        if ($comando->execute()) {
            if ($comando->rowCount() > 0) {
                
                $Tabela     = $comando->fetchAll(PDO::FETCH_ASSOC);
                $retorno    = $Tabela;
            } else {
                $retorno = "nenhum ingrediente encontrado";
            }
        }
    } catch (PDOException $erro) {
        $retorno = $erro->getMessage();
    }
    return $retorno;
}
//-------------------------------------ALTERAR imagem---------------------------------------------------
public function AlterarImg(){
//retira a imagem velha e troca pela nova que esta no alterarFunc.php

$tabImg = $this->conexao->prepare("SELECT * FROM tb_pratos WHERE id_prato = ?");
$tabImg->bindParam(1, $this->idPrato);
$tabImg->execute();
$resultado = $tabImg->fetch(PDO::FETCH_ASSOC);

if ($resultado) {
    $imagemVelha = "../imagem/" . $resultado['img'];
        unlink($imagemVelha);
}
else {
    $retorno = "Imagem não encontrada";
}
try{
    $comando = $this->conexao->prepare("UPDATE tb_pratos SET img = ? WHERE id_prato= ?");
        $comando->bindParam(1,$this->ImgAtual);
        $comando->bindParam(2, $this->idPrato);
        if ($comando->execute()) {
        $retorno = "<script>alert('gravado com sucesso');</script>";
        } else {
            $retorno = json_encode($comando->fetchAll(PDO::FETCH_ASSOC));
        }
    } catch (PDOException $erro) {
        $retorno = $erro->getMessage();
    }

echo $retorno;
}

//--------------------alteração dos dados do prato --------------------------------------------------------------------------------------------

public function Alterar() //mudar os nomes das funções
{
    try {

        
        $comando = $this->conexao->prepare("UPDATE tb_pratos SET 
            nm_prato = ?, 
            prato_ingr_1 = ?, 
            prato_ingr_2 = ?, 
            prato_ingr_3 = ?,
            preco_prato = ?,  
            desconto = ?, 
            val_tot = ?
            WHERE id_prato = ?");

        $comando->bindParam(1,$this->Prato);
        $comando->bindParam(2,$this->PratoIngr1);
        $comando->bindParam(3,$this->PratoIngr2);
        $comando->bindParam(4,$this->PratoIngr3);
        $comando->bindParam(5,$this->PrecoPrato);
        $comando->bindParam(6,$this->Desconto);
        $comando->bindParam(7,$this->ValTot);
        $comando->bindParam(8, $this->idPrato);
        if ($comando->execute()) {
            
            $retorno = "<script>alert('gravado com sucesso');</script>";
        } else {
            $retorno = "Erro ao executar o comando de alteração";
        }
    } catch (PDOException $erro) {
        $retorno = $erro->getMessage();
    }
    return $retorno;
}
}
?>