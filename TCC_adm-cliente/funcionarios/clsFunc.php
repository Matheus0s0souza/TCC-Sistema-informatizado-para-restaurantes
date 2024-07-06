<?php
//define('BASE_PATH', __DIR__);
class clsFunc{

private $IdFunc;
private $NmFunc;
private $Email;
private $Senha;
private $Cpf;
private $Cargo;
private $Hier;

//-----------------------imagem---------------------------------------------------------------

private $ImgAtual;
private $ImgTemp;
private $Destino;

//-----------------------conexao--------------------------------------------------------------
private $conexao; // conexao com o database

public function __construct($conexao) { 
    $this->conexao = $conexao;
}

//------------------------ID funcionario-------------------------------------------------
public function getIdFunc()
{
    return $this->IdFunc;
}
public function setIdFunc($IdF)
{
    $this->IdFunc = $IdF;
}

//-------------------------Nome funcionario----------------------------------------------
public function getNmFunc()
{
    return $this->NmFunc;
}
public function setNmFunc($NmF)
{
    $this->NmFunc = $NmF;
}

//--------------------------Email-------------------------------------------------------

public function getEmail()
{
    return $this->Email;
}
public function setEmail($Em)
{
    $this->Email = $Em;
}
//----------------------------Senha-------------------------------------------------------

public function getSenha()
{
    return $this->Senha;
}
public function setSenha($Sen)
{
    $this->Senha = $Sen;
}
//--------------------------CPF------------------------------------------------------------
public function getCpf()
{
    return $this->Cpf;
}
public function setCpf($Cpf)
{
    $this->Cpf = $Cpf;
}
//---------------------------Cargo----------------------------------------------------------
public function getCargo()
{
    return $this->Cargo;
}
public function setCargo($Car)
{
    $this->Cargo = $Car;
}
//----------------------------Hier----------------------------------------------------------
public function getHier()
{
    return $this->Hier;
}
public function setHier($Hi)
{
    $this->Hier = $Hi;
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



//------------------registro------------------------------------------

public function Registrar()
{

    //include "conexao.php";
    try{

        
        $comando=$this->conexao->prepare("insert into login_funcionario (nm_func, email_func, senha_func,cpf_func,cargo,hierarquia,img) values (?,?,?,?,?,?,?)");
        $comando->bindParam(1,$this->NmFunc);
        $comando->bindParam(2,$this->Email);
        $comando->bindParam(3,$this->Senha);
        $comando->bindParam(4,$this->Cpf);
        $comando->bindParam(5,$this->Cargo);
        $comando->bindParam(6,$this->Hier);
        $comando->bindParam(7,$this->ImgAtual);

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
            $comando=$this->conexao->prepare("SELECT * FROM login_funcionario WHERE nm_func = ? or cpf_func = ? or email_func = ?;");
            $comando->bindParam(1,$this->NmFunc);
            $comando->bindParam(2,$this->Email);
            $comando->bindParam(3,$this->Cpf);

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
        return $retorno;
    }
//--------------------------------- deletar -----------------------------------------

public function Deletar() {
    try {
        $tabImg = $this->conexao->prepare("SELECT * FROM login_funcionario WHERE id_func = ?");
        $tabImg->bindParam(1, $this->IdFunc);
        $tabImg->execute();
        $resultado = $tabImg->fetch(PDO::FETCH_ASSOC);
        
        if ($resultado) {
            // Deletar a imagem
            unlink("imagem/" . $resultado['img']);
        } else {
            //se a imagem não voltar
            $retorno = "Imagem nao encontrada";
        }

        $comando = $this->conexao->prepare("DELETE FROM login_funcionario WHERE id_func = ?");
        $comando->bindParam(1, $this->IdFunc);

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
        $comando = $this->conexao->prepare("SELECT * FROM login_funcionario WHERE id_func = ?");
        $comando->bindParam(1, $this->IdFunc);

        if ($comando->execute()) {
            if ($comando->rowCount() > 0) {
                
                $Tabela     = $comando->fetchAll(PDO::FETCH_ASSOC);
                $retorno    = json_encode($Tabela);
            } else {
                $retorno = json_encode($comando);
            }
        }
    } catch (PDOException $erro) {
        $retorno = $erro->getMessage();
    }
    return $retorno;
}
//-------------------------------------ALTERAR IMAGEM DO FUNCIONARIO---------------------------------------------------------------------------------

public function  AlterarImg(){
//retira a imagem velha e troca pela nova que esta no alterarFunc.php

        $tabImg = $this->conexao->prepare("SELECT * FROM login_funcionario WHERE id_func = ?");
        $tabImg->bindParam(1, $this->IdFunc);
        $tabImg->execute();
        $resultado = $tabImg->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            $imagemVelha = "../imagem/" . $resultado['img']; //alterei o diretorio
            var_dump($imagemVelha);

        unlink($imagemVelha);
        }
        try{
            $comando = $this->conexao->prepare("UPDATE login_funcionario SET img= ? WHERE id_func=?");
            $comando->bindParam(1,$this->ImgAtual);
            $comando->bindParam(2,$this->IdFunc);
            if ($comando->execute()) {
            
                $retorno = "<script>alert('gravado com sucesso');</script>";
            } else {
                $retorno = json_encode($comando->fetchAll(PDO::FETCH_ASSOC));
            }
        } catch (PDOException $erro) {
            $retorno = $erro->getMessage();
        }
        return $retorno;
    }


//depois ele faz o update dos dados no banco de dados  




//--------------------------------------------ALTERAR DADOS DO FUNCIONARIO---------------------------------------------------------------------------------------------
public function Alterar() //mudar os nomes das funções
{

    try {       
        $comando = $this->conexao->prepare("UPDATE login_funcionario SET  nm_func = ?, email_func=?, senha_func =?, cpf_func =?, cargo= ?, hierarquia= ? WHERE id_func=?");
        
        $comando->bindParam(1,$this->NmFunc);
        $comando->bindParam(2,$this->Email);
        $comando->bindParam(3,$this->Senha);
        $comando->bindParam(4,$this->Cpf);
        $comando->bindParam(5,$this->Cargo);
        $comando->bindParam(6,$this->Hier);
        $comando->bindParam(7,$this->IdFunc);
        if ($comando->execute()) {
            
            $retorno = "<script>alert('gravado com sucesso');</script>";
        } else {
            $retorno = json_encode($comando->fetchAll(PDO::FETCH_ASSOC));
        }
    } catch (PDOException $erro) {
        $retorno = $erro->getMessage();
    }
    return $retorno;
}
}
?>