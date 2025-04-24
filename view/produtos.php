<?php
session_start();
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
                <a href="../index.html">Inicio</a>
                <a href="meusdados.php">Meus dados</a>
                <a href="formapagamento.php">Pagamento</a>
        </div>
        
        <!-- Barra de Pesquisa -->
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Pesquisar..." onkeyup="filtrarProdutos()">
            <button onclick="filtrarProdutos()">🔍</button>
        </div>
    </div>
    </header>
<main>

    <div class="container">

        <h2>Escolha o tamanho do copo:</h2>
        <div class="tamanhos">
            <label>
                <img src="../img/copopequeno.png" alt="Pequeno" class="opcao-img">
                <input type="radio" name="tamanho" value="pequeno"> Pequeno (300ml)
            </label>
            <label>
                <img src="../img/copomedio.png" alt="Médio" class="opcao-img">
                <input type="radio" name="tamanho" value="medio"> Médio (500ml)
            </label>
            <label>
                <img src="../img/copogrande.png" alt="Grande" class="opcao-img">
                <input type="radio" name="tamanho" value="grande"> Grande (700ml)
            </label>
        </div>

        <h2>Escolha seus acompanhamentos:</h2>
        <div class="acompanhamentos">
            <label>
                <img src="../img/granola.png" alt="Granola" class="opcao-img">
                <input type="checkbox" name="acompanhamento" value="granola"> Granola
            </label>
            <label>
                <img src="../img/banana.png" alt="Banana" class="opcao-img">
                <input type="checkbox" name="acompanhamento" value="banana"> Banana
            </label>
            <label>
                <img src="../img/morangos.png" alt="Morangos" class="opcao-img">
                <input type="checkbox" name="acompanhamento" value="morangos"> Morangos
            </label>
            <label>
                <img src="../img/leite_condensado.png" alt="Leite Condensado" class="opcao-img">
                <input type="checkbox" name="acompanhamento" value="leite_condensado"> Leite Condensado
            </label>
            <label>
                <img src="../img/mel.png" alt="Mel" class="opcao-img">
                <input type="checkbox" name="acompanhamento" value="mel"> Mel
            </label>
            <label>
                <img src="../img/paçoca.png" alt="Paçoca" class="opcao-img">
                <input type="checkbox" name="acompanhamento" value="paçoca"> Paçoca
            </label>
            <label>
                <img src="../img/chocolate.png" alt="Chocolate" class="opcao-img">
                <input type="checkbox" name="acompanhamento" value="chocolate"> Chocolate
            </label>
            <label>
                <img src="../img/nutella.png" alt="Nutella" class="opcao-img">
                <input type="checkbox" name="acompanhamento" value="nutella"> Nutella
            </label>
            <label>
                <img src="../img/coco_ralado.png" alt="Coco Ralado" class="opcao-img">
                <input type="checkbox" name="acompanhamento" value="coco_ralado"> Coco Ralado
            </label>
            <label>
                <img src="../img/castanha.png" alt="Castanha" class="opcao-img">
                <input type="checkbox" name="acompanhamento" value="castanha"> Castanha
            </label>
        </div>

        <button onclick="irParaPagamento()">Ir para o Pagamento</button>
    </div>

    <script>
        function irParaPagamento() {
            const tamanhoSelecionado = document.querySelector('input[name="tamanho"]:checked');
            const acompanhamentosSelecionados = document.querySelectorAll('input[name="acompanhamento"]:checked');

            if (!tamanhoSelecionado) {
                alert("Por favor, selecione o tamanho do copo.");
                return;
            }

            if (acompanhamentosSelecionados.length === 0) {
                alert("Por favor, selecione pelo menos um acompanhamento.");
                return;
            }

            alert("Redirecionando para o pagamento...");
            window.location.href = "formapagamento.php";
        }
    </script>

    <script src="../script/menu.js"></script>
    <script src="../script/produtos.js"></script>
    
    <br><br><br><br><br><br><br><br>
</main>
<footer>
    <p>&copy; 2025 Açaí do Ted. Todos os direitos reservados.</p>
    <p>Endereço: Rua Jubirasca, 777</p>
    <p>Telefone: 51 3598 1488</p>
    <div>
        <a href="https://instagram.com/sualoja" target="_blank" style="margin: 0 10px;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram" width="30">
        </a>
        <a href="https://wa.me/seunumerodetelefone" target="_blank" style="margin: 0 10px;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" width="30">
        </a>
        <img src="../img/Açai TED.png" alt="Logo" class="footer-image">
    </div>
</footer>
</body>

</html>