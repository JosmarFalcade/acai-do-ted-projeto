<?php
function cadastrar()
{
    require '../DAO/conexaoDAO.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pnome = $_POST['Pnome'];
        $snome = $_POST['Snome'];
        $email = $_POST['Email'];
        $senha = $_POST['Senha'];
        $senha_confirm = $_POST['SenhaConfirm'];

        // Verifica se as senhas coincidem
        if ($senha != $senha_confirm) {
            $error = 'As senhas não coincidem.';
        } else {
            // Verifica se o nome de usuário já existe
            $stmt = $pdo->prepare("SELECT * FROM cliente WHERE EmailCli = ?");
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $error = 'Nome de usuário já existe.';
            } else {
                // Insere o novo usuário no banco de dados
                $hashed_password = password_hash($senha, PASSWORD_BCRYPT);
                $stmt = $pdo->prepare("INSERT INTO cliente (PnomeCli, SnomeCli, EmailCli, SenhaCli) VALUES (?, ?, ?, ?)");
                if ($stmt->execute([$pnome, $snome, $email, $hashed_password])) {
                    $success = 'Usuário registrado com sucesso. Você pode fazer login agora.';
                } else {
                    $error = 'Erro ao registrar o usuário. Tente novamente.';
                }
            }
        }
    }
}

function login()
{
    require '../DAO/conexaoDAO.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Consulta ao banco de dados para verificar o usuário
        $stmt = $pdo->prepare("SELECT * FROM cliente WHERE EmailCli = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($senha, $cliente['senha'])) {
            $_SESSION['user_id'] = $user['idcli'];
            $_SESSION['email'] = $user['EmailCli'];
            header('Location: itens.php');
            exit();
        } else {
            $error = 'Nome de usuário ou senha inválidos';
        }
    }
}
?>