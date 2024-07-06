<?php
session_start();
include_once "conexao.php";

if (isset($_POST["alterar"])) {
    $senhaAnt = $_POST['senhAnt'];
    $senhaNov = $_POST['senhNov'];
    
    // Debugging: Print the submitted passwords
    //echo "Submitted Old Password: " . htmlspecialchars($senhaAnt) . "<br>";
    //echo "Submitted New Password: " . htmlspecialchars($senhaNov) . "<br>";

    // Check if session data is available and the user is logged in
    if (isset($_SESSION['dados']) && is_object($_SESSION['dados'])) {
        $dados = $_SESSION['dados'];
        $email = $dados->email_func;

        // Debugging: Print the email
        //echo "User Email: " . htmlspecialchars($email) . "<br>";

        // Fetch the original password from the database
        $comando = $conexao->prepare("SELECT senha_func FROM login_funcionario WHERE email_func = ?");
        $comando->bindParam(1, $email);

        if ($comando->execute()) {
            $senhaVelha = $comando->fetch(PDO::FETCH_ASSOC)['senha_func'];

            // Debugging: Print the fetched password
            //echo "Fetched Old Password: " . htmlspecialchars($senhaVelha) . "<br>";

            // Verify the old password
            if ($senhaAnt === $senhaVelha) {
                // Check if the new password is different from the old password
                if ($senhaNov !== $senhaVelha) {
                    // Update the password in the database
                    $updateComando = $conexao->prepare("UPDATE login_funcionario SET senha_func = ? WHERE email_func = ?");
                    $updateComando->bindParam(1, $senhaNov);
                    $updateComando->bindParam(2, $email);

                    if ($updateComando->execute()) {
                        echo "<script>alert('Senha alterada com sucesso'); window.location.href = '../../index.php';</script>";
                    } else {
                        echo "<script>alert('Erro ao alterar a senha'); window.location.href = '../index.php';</script>";
                    }
                } else {
                    echo "<script>alert('A nova senha não pode ser igual à senha antiga'); window.location.href = '../index.php';</script>";
                }
            } else {
                echo "<script>alert('Senha original incorreta'); window.location.href = '../index.php';</script>";
            }
        } else {
            echo "<script>alert('Erro ao buscar a senha original'); window.location.href = '../index.php';</script>";
        }
    } else {
        echo "<script>alert('Você precisa estar logado para alterar a senha'); window.location.href = '../index.php';</script>";
    }
} else {
    echo "Form not submitted.";
}
?>
