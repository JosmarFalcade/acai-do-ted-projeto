<?php
session_start();
require '../DAO/conexao.php';

$tamanho = $_SESSION['tamanho'] ?? 'Não selecionado';
$acompanhamentos = $_SESSION['acompanhamentos'] ?? [];

echo "<h2>Resumo do pedido</h2>";
echo "Tamanho: $tamanho<br>";
echo "Acompanhamentos: " . implode(", ", $acompanhamentos);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/geral.css">
    <link rel="stylesheet" href="../estilos/formapagamento.css">
    <link rel="stylesheet" href="../estilos/estilo.css">
    <title>Formas de Pagamento</title>

</head>

<body>
    <header>
        <div class="navbar">
            <span class="menu-toggle">☰</span>
            <div class="menu">
                <a href="../index.html">Inicio</a>
                <a href="meusdados.php">Meus dados</a>
                <a href="login.php">Login</a>
                <a href="cadastro.php">Cadastrar</a>
                <a href="produtos.php">Escolha o seu açaí</a>
            </div>

            <!-- Barra de Pesquisa -->
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Pesquisar..." onkeyup="filtrarProdutos()">
                <button onclick="filtrarProdutos()">🔍</button>
            </div>
    </header>
    </div>
    <div class="container">
        <h1>Formas de Pagamento</h1>
        <form method="POST" action="../controller/pedidoprocessa.php">
            <input type="hidden" name="tamanho" value="<?= $_SESSION['tamanho'] ?>">
            <?php foreach ($_SESSION['acompanhamentos'] as $id): ?>
                <input type="hidden" name="acompanhamento[]" value="<?= $id ?>">
            <?php endforeach; ?>

            <label><input type="radio" name="pagamento_id" value="1" required> Pix</label><br>
            <label><input type="radio" name="pagamento_id" value="2" required> Cartão</label><br>
            <label><input type="radio" name="pagamento_id" value="3" required> Dinheiro</label><br>

            <button type="submit">Finalizar Pedido</button>
        </form>

        <div id="mensagem"></div>
    </div>

    <script src="../script/menu.js"></script>
    <script src="../script/pagamento.js"></script>

</body>
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

</html>