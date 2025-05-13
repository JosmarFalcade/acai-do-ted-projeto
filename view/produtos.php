<?php
session_start();
require_once '../controller/clienteprocessa.php';
require_once '../DAO/conexaoDAO.php';
verificaLogout();

$tamanhos = [];
$stmt = $pdo->query("SELECT idtamanho, nome, volume_ml, caminho FROM tamanho");
$tamanhos = $stmt->fetchAll();

// Carregar Acompanhamentos
$acompanhamentos = [];
$stmt = $pdo->query("SELECT idacompanhamento, nomeacompanhamento, caminho FROM acompanhamento");
$acompanhamentos = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tamanho']) && isset($_POST['acompanhamento'])) {
        $_SESSION['tamanho'] = $_POST['tamanho'];
        $_SESSION['acompanhamentos'] = $_POST['acompanhamento'];
        header('Location: formapagamento.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha seu Açaí</title>
    <link rel="stylesheet" href="../estilos/geral.css">
    <link rel="stylesheet" href="../estilos/estilo.css">
    <link rel="stylesheet" href="../estilos/produtos.css">
</head>

<body>
    <header>
        <div class="navbar">
            <span class="menu-toggle">☰</span>
            <div class="menu">
                <a href="meusdados.php">Meus dados</a>
                <form method="GET" action="produtos.php" style="display: inline;">
                    <input type="hidden" name="acao" value="sair">
                    <button type="submit"
                        style="background-color: #c0392b; color: white; padding: 8px 16px; border: none; border-radius: 5px; cursor: pointer;">
                        Sair da Conta
                    </button>
                </form>
            </div>
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Pesquisar..." onkeyup="filtrarProdutos()">
                <button type="button" onclick="filtrarProdutos()">🔍</button>
            </div>
        </div>
    </header>

    <main>
        <form method="POST" action="produtos.php" onsubmit="return validarFormulario()">
            <div class="container">
                <h2>Escolha o tamanho do copo:</h2>
                <div class="tamanhos">
                    <?php foreach ($tamanhos as $t): ?>
                        <label>
                            <img src="../<?= htmlspecialchars($t['caminho']) ?>" alt="<?= htmlspecialchars($t['nome']) ?>"
                                class="opcao-img">
                            <input type="radio" name="tamanho" value="<?= $t['idtamanho'] ?>">
                            <?= htmlspecialchars($t['nome']) ?> (<?= htmlspecialchars($t['volume_ml']) ?> ml)
                        </label>
                    <?php endforeach; ?>
                </div>
                <h2>Escolha seus acompanhamentos:</h2>
                <div class="acompanhamentos">
                    <?php foreach ($acompanhamentos as $a): ?>
                        <label>
                            <img src="../<?= htmlspecialchars($a['caminho']) ?>"
                                alt="<?= htmlspecialchars($a['nomeacompanhamento']) ?>" class="opcao-img">
                            <input type="checkbox" name="acompanhamento[]" value="<?= $a['idacompanhamento'] ?>">
                            <?= htmlspecialchars($a['nomeacompanhamento']) ?>
                        </label>
                    <?php endforeach; ?>
                </div>
                <button type="submit" name="submit">Ir para o Pagamento</button>
            </div>
            <br><br><br><br><br><br><br><br>
        </form>

        <script>
            function validarFormulario() {
                const tamanhoSelecionado = document.querySelector('input[name="tamanho"]:checked');
                const acompanhamentosSelecionados = document.querySelectorAll('input[name="acompanhamento[]"]:checked');

                if (!tamanhoSelecionado) {
                    alert("Por favor, selecione o tamanho do copo.");
                    return false;
                }

                if (acompanhamentosSelecionados.length === 0) {
                    alert("Por favor, selecione pelo menos um acompanhamento.");
                    return false;
                }

                return true; // Envia o formulário
            }
        </script>

        <script src="../script/menu.js"></script>
        <script src="../script/produtos.js"></script>
    </main>

    <footer>
        <p>&copy; 2025 Açaí do Ted. Todos os direitos reservados.</p>
        <p>Endereço: Rua Jubirasca, 777</p>
        <p>Telefone: 51 3598 1488</p>
        <div>
            <a href="https://instagram.com/sualoja" target="_blank" style="margin: 0 10px;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram"
                    width="30">
            </a>
            <a href="https://wa.me/seunumerodetelefone" target="_blank" style="margin: 0 10px;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" width="30">
            </a>
            <img src="../img/Açai TED.png" alt="Logo" class="footer-image">
        </div>
    </footer>
</body>

</html>