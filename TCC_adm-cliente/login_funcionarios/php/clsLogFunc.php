<?php
class clsLogFunc
{

    private $Email;
    Private $Senha;


//-----------------------conexao--------------------------------------------------------------
private $conexao; // conexao com o database

public function __construct($conexao) { 
    $this->conexao = $conexao;
}    

//------------------email---------------
public function getemail()
{
    return $this->Email;
}
public function setemail($em)
{
    $this->Email=$em;
}
//-----------------senha----------------
public function getsenha()
{
    return $this->Senha;
}
public function setsenha($sn)
{
    $this->Senha=$sn;
}
//---------------login-------------------------------------

public function login(){
    include_once "conexao.php";


    try{
        $comando= $this->conexao ->prepare("SELECT nm_func, email_func, senha_func,cpf_func,cargo,hierarquia,img 
        FROM login_funcionario WHERE email_func=? and senha_func=?");
        $comando ->bindParam(1,$this->Email);
        $comando ->bindParam(2,$this->Senha);
        if ($comando->execute())
        {
            if($comando->rowCount()>0)
            {
                $retorno= $comando->fetch(PDO::FETCH_OBJ);
            }
            else{
                $retorno= "<script>alert('login invalido');</script>";
            }
        }
    }
    catch(PDOException $erro)
    {
        $retorno="erro".$erro->getMessage();
    }
    return $retorno;
}







}



?>