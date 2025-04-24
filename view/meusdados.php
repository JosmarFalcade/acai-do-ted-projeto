<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/estilo.css">
    <link rel="stylesheet" href="../estilos/geral.css">
    <link rel="stylesheet" href="../estilos/meusdados.css">
    <title>Perfil do Usuário</title>

</head>
<body>
    <header>
        <div class="navbar">
            <span class="menu-toggle">☰</span>
            <div class="menu">
                <a href="../index.html">Inicio</a>
                <a href="produtos.php">Escolha o seu açaí</a>
            </div>
            
            <!-- Barra de Pesquisa -->
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Pesquisar..." onkeyup="filtrarProdutos()">
                <button onclick="filtrarProdutos()">🔍</button>
            </div>
        </header>
        <br><br><br><br>
    <div class="container">
        <h2>Perfil do Usuário</h2>
        <form>
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" placeholder="Digite seu nome">

            <label for="sobrenome">Sobrenome</label>
            <input type="text" id="surname" name="surname" placeholder="Digite seu sobrenome">

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="Digite seu e-mail">

            <label for="password">Senha</label>
            <input type="password" id="password" name="password" placeholder="Digite sua senha">

            <label for="password">Confirme a Senha</label>
            <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirme sua senha">

            <button type="submit">Salvar</button>
        </form>
    </div>
    <script src="../script/menu.js"></script>
</body>
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
</html>
