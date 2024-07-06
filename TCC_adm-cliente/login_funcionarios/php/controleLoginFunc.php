<?php
session_start();
include_once "conexao.php";
include_once "clsLogFunc.php";

$cad = new clsLogFunc($conexao);

$Email = filter_input(INPUT_GET, "Email");
$Senha = filter_input(INPUT_GET, "Senha");

$cad->setEmail($Email);
$cad->setSenha($Senha);

// Command to login
if (isset($_GET["Login"])) {
    $dados = $cad->login();

    if ($dados != "login invalido") {
        $_SESSION['dados'] = $dados;
        echo json_encode($dados);
    } else {
        echo "<script>alert('login invalido');</script>";
    }
    header("location: ../../index.php");
    exit();
}

//logado--------------------------------------------------------------------------------------
if (isset($_GET["logado"])) {
    if (isset($_SESSION['dados']) && $_SESSION['dados'] !== null) {
        echo json_encode($_SESSION['dados']);
    } else {
        echo "nada";
    }
    exit();
}

//logout------------------------------------------------------------------------
if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
    header("Location: ../../login_funcionarios/");
    exit();
}


//email senha--------------------------------------------------------------------------------------
if (isset($_GET["RecSen"])) {

    try {
        // Prepare and execute the query
        $comando = $conexao->prepare("SELECT email_func, senha_func FROM login_funcionario WHERE email_func = ?;");
        $comando->bindParam(1, $Email);

        if ($comando->execute()) {
            if ($comando->rowCount() > 0) {
                $Tabela = $comando->fetchAll(PDO::FETCH_ASSOC);

                foreach ($Tabela as $row) {
                    $Email = "tccrestaurante6@gmail.com"; //$row['email_func'];
                    $Senha = $row['senha_func'];
					

                    // Email setup
                    $nome = "Restaurante";
                    $Assunto = "Sua senha";
                    $Msg = "Sua senha é: ". $Senha; // Ensure the message is appropriately formatted

                    include "PHPMailer/PHPMailerAutoload.php";

                    $mail = new PHPMailer;
                    $mail->isSMTP();
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port = "587";
                    $mail->SMTPSecure = "tls";
                    $mail->SMTPAuth = true;
                    $mail->Username = "tccrestaurante6@gmail.com";
                    $mail->Password = "ieifwbyzoacyuduv";
                    $mail->setFrom($mail->Username, "Restaurante");
                    $mail->addAddress($Email);
                    $mail->Subject = $Assunto;
                    $mail->isHTML(true);
                    $mail->Body = $Msg;
					echo "----------------------------------------------------------------------------------------------";
					echo $mail->SMTPDebug = 2;

                    if ($mail->send()) {
                        echo "<script>alert('Recuperação enviada para o email.');</script>";
						echo "---------------------------------------------------------------------------------------";
						echo $mail->SMTPDebug = 2;
						echo "--------------------------------------------------------------------------------------";
						echo $mail->SMTPDebug = 2;
                    } else {
                        echo "<script>alert('Erro ao enviar o email.');</script>";
                    }
                }
                echo "<script>javascript:window.location='../index.php';</script>";
            } else {
                $retorno = "Nenhum funcionário encontrado";
            }
        }
    } catch (PDOException $erro) {
        $retorno = "Erro: " . $erro->getMessage();
        echo $retorno;
    }
}
