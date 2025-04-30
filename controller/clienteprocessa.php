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
    session_start(); // Inicia a sessão
    require '../DAO/conexaoDAO.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Consulta ao banco de dados para verificar o usuário
        $stmt = $pdo->prepare("SELECT * FROM cliente WHERE EmailCli = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Verifica se o usuário existe e se a senha é correta
        if ($user && password_verify($senha, $user['SenhaCli'])) {
            $_SESSION['id_cliente'] = $user['idcli']; // Definindo a sessão com id_cliente
            $_SESSION['email'] = $user['EmailCli']; // Definindo o e-mail na sessão
            header('Location: produtos.php'); // Redireciona para a página de itens
            exit();
        } else {
            $error = 'Nome de usuário ou senha inválidos'; // Mensagem de erro
        }
    }
}
function processarAtualizacaoCliente($idCliente) {
    require '../DAO/conexaoDAO.php'; // Agora pega $pdo

    $nome = $_POST['name'];
    $sobrenome = $_POST['surname'];
    $email = $_POST['email'];

    if (!empty($_POST['password'])) {
        $senha = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE cliente SET PnomeCli = ?, SnomeCli = ?, EmailCli = ?, SenhaCli = ? WHERE idcli = ?";
        $stmt = $pdo->prepare($sql);
        $success = $stmt->execute([$nome, $sobrenome, $email, $senha, $idCliente]);
    } else {
        $sql = "UPDATE cliente SET PnomeCli = ?, SnomeCli = ?, EmailCli = ? WHERE idcli = ?";
        $stmt = $pdo->prepare($sql);
        $success = $stmt->execute([$nome, $sobrenome, $email, $idCliente]);
    }

    if ($success) {
        echo "<script>alert('Dados atualizados com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao atualizar dados.');</script>";
    }
}



function buscarDadosCliente($idCliente) {
    require '../DAO/conexaoDAO.php'; // Agora pega $pdo
    $stmt = $pdo->prepare("SELECT * FROM cliente WHERE idcli = ?");
    $stmt->execute([$idCliente]);

    if ($stmt->rowCount() > 0) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        return null;
    }
}


function excluirDadosCliente($idCliente) {
    require '../DAO/conexaoDAO.php';

    $stmt = $pdo->prepare("DELETE FROM cliente WHERE idcli = ?");
    if ($stmt->execute([$idCliente])) {
        session_destroy();
        echo "<script>alert('Conta excluída com sucesso.'); window.location.href = 'login.php';</script>";
        exit();
    } else {
        echo "<script>alert('Erro ao excluir a conta.');</script>";
    }
}


?>