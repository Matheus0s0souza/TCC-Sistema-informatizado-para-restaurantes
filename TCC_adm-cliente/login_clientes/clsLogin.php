<?php
class clsLogin{

    private $nome;
    private $email;
    private $senha;
    private $cpf;
    private $tel;
    private $ende;

    private $senhaVer;

//------------------nome---------------
public function getnome()
{
    return $this->nome;
}
public function setnome($nm)
{
    $this->nome=$nm;
}
//------------------email---------------
public function getemail()
{
    return $this->email;
}
public function setemail($em)
{
    $this->email=$em;
}
//-----------------senha----------------
public function getsenha()
{
    return $this->senha;
}
public function setsenha($sn)
{
    $this->senha=$sn;
}
//-----------------nascimento-----------
public function getcpf()
{
    return $this->cpf;
}
public function setnasc($cp)
{
    $this->cpf=$cp;
}
//----------------telefone--------------
public function gettel()
{
    return $this->tel;
}
public function settel($tl)
{
    $this->tel=$tl;
}
//---------------endereço----------------
public function getende()
{
    return $this->ende;
}
public function setende($ed)
{
    $this->ende=$ed;
}


//-------------------------senhaVer------------------------


public function getsenhaVer()
{
    return $this->senhaVer;
}
public function setsenhaVer($sv)
{
    $this->senhaVer=$sv;
}


//-------------------------------------------------------------

//----------------banco de dados--------------------------------

public function cadastrar()
{
    include_once "conexao.php";

    try{
        $comando = $conexao ->prepare("insert into login (nome,email,senha,cpf,tel,ende)values(?,?,?,?,?,?)");
        $comando ->bindParam(1,$this->nome);
        $comando ->bindParam(2,$this->email);
        $comando ->bindParam(3,$this->senha);
        $comando ->bindParam(4,$this->cpf);
        $comando ->bindParam(5,$this->tel);
        $comando ->bindParam(6,$this->ende);
        
        if ($comando->execute())
        {
            $retorno="gravado";
        }
    }
    catch(PDOException $erro)
    {
        $retorno="erro".$erro->getMessage();
    }
    return $retorno;

}


//------------------------------------login--------------------------------------------------------------------------------------------

public function login(){
    include_once "conexao.php";

   

    try{
        $comando= $conexao ->prepare("SELECT id, nome, email, senha, nasc, tel, ende FROM login WHERE email=? and senha=?");
        $comando ->bindParam(1,$this->email);
        $comando ->bindParam(2,$this->senha);
        if ($comando->execute())
        {
            if($comando->rowCount()>0)
            {
                $retorno= $comando->fetch(PDO::FETCH_OBJ);
            }
            else{
                $retorno= "login invalido";
            }
        }
    }
    catch(PDOException $erro)
    {
        $retorno="erro".$erro->getMessage();
    }
    return $retorno;
}

//----------------------------------Excluir-----------------------------------------------------------------------------------------------------


public function excluir(){
    include_once "conexao.php";

if($this->senha == $this->senhaVer && $this->email){
    try{
        $comando= $conexao ->prepare("DELETE FROM login WHERE email=? and senha=?");
        $comando ->bindParam(1,$this->email);
        $comando ->bindParam(2,$this->senha);
        if ($comando->execute())
        header("location: index.html");
    }
    catch(PDOException $erro)
    {
        $retorno="erro".$erro->getMessage();
    }
    return $retorno;


}
else {
    $retorno= 'dados errados';
    return $retorno;
}
}
}


?>