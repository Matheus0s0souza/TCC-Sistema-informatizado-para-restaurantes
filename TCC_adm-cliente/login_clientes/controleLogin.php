<?php
session_start(); //iniciando uma session
include_once "clsLogin.php";

$cad = new clsLogin();

$nome       = filter_input(INPUT_POST, "nome");
$email      = filter_input(INPUT_POST, "email");
$senha      = filter_input(INPUT_POST, "senha");
$cpf       = filter_input(INPUT_POST, "cpf");
$tel        = filter_input(INPUT_POST, "tel");
$ende       = filter_input(INPUT_POST, "ende");

$senhaVer   = filter_input(INPUT_POST, "senhaVer");


$cad->setnome($nome);
$cad->setemail($email);
$cad->setsenha($senha);
$cad->setnasc($cpf);
$cad->settel($tel);
$cad->setende($ende);

$cad->setsenhaVer($senhaVer);

//--------------------CADASTRO----------------------------------------------------------------------------------------------------
if (isset($_POST["cadastrar"])) {
    echo $cad->cadastrar();
}

//------------------------LOGIN-------------------------------------------------------------------------------------------------

//executa a função de login e coletando os dados armazenando eles em uma Session
if (isset($_POST["entrar"])) {
    $dados = $cad->login();

    if ($dados == "login invalido") {
        echo "invalido";
    } elseif ($dados->email == $email & $dados->senha == $senha) {
        $_SESSION['dados'] = $dados;
        header("location: index.php");
    }
}
//------------------------LOGADO--------------------------------------------------------------------------------------------------

// execuntando a função para buscar os dados no session e armazendo elas em um json
if (isset($_POST["logado"])) {
    if(isset($_SESSION['dados']) && $_SESSION['dados'] !== null){
    echo json_encode($_SESSION['dados']);
    }
    else{
        echo "nada";
    }
}
//---------------------------LOGOUT-----------------------------------------------------------------------------------------------


if(isset($_POST["logOut"]))
{
    unset($_SESSION['dados']);
    //session_destroy();
}

//--------------------------EXCLUIR------------------------------------------------------------------------------------------------

if (isset($_POST["excluir"])) {
    $dados = $cad->excluir();
    if ($dados == 'dados errados') {
        echo "dados errados";
    }
    /*if ($dados == "dados invalido") {
        echo "invalido";
    } elseif ($dados->email == $email && $dados->senha == $senha && $senhaVer == $dados->senha) {
        header("location: index.php");
    } elseif ($dados->email == $email && $dados->senha == $senha && $senhaVer != $dados->senha) {
        echo "verificação de sernha está errada";
    }  */
}
