<?php
session_start();
require '../DAO/conexaoDAO.php';
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/cadastro.css">
    <link rel="stylesheet" href="../estilos/geral.css">
    <title>Cadastro</title>

</head>

<body>
    <header>
        <div class="navbar">
            <span class="menu-toggle">☰</span>
            <div class="menu">
                <a href="../index.html">Inicio</a>
                <a href="meusdados.php">Meus dados</a>
                <a href="login.php">Login</a>
                <a href="produtos.php">Escolha o seu açaí</a>
            </div>

            <!-- Barra de Pesquisa -->
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Pesquisar..." onkeyup="filtrarProdutos()">
                <button onclick="filtrarProdutos()">🔍</button>
            </div>
    </header>
    <div class="container">
        <div class="form-image">
            <img src="../img/copo de acai.jpg" alt="">
        </div>

        <div class="form">
            <?php
            require '../controller/clienteprocessa.php';
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                cadastrar();
            }
            ?>
            <form method="POST">

                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>

                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="firstname">Primeiro nome</label>
                        <input id="firstname" type="text" name="Pnome" placeholder="Digite seu primeiro nome" required>
                    </div>

                    <div class="input-box">
                        <label for="lastname">Sobrenome</label>
                        <input id="lastname" type="text" name="Snome" placeholder="Digite seu sobrenome" required>
                    </div>
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="Email" placeholder="Digite seu email" required>
                    </div>
                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="Senha" placeholder="Digite sua senha" required>
                    </div>
                    <div class="input-box">
                        <label for="password">Confirme sua senha</label>
                        <input id="password" type="password" name="SenhaConfirm" placeholder="Confirme sua senha"
                            required>
                    </div>
                </div>



                <div class="continue-button">
                    <button><a href="#">Continuar</a></button>
                </div>
                <div class="possui-conta">
                    <h6>Já possui uma conta?</h6>
                </div>
                <div class="login-button">
                    <button><a href="login.php">Login</a></button>
                </div>
            </form>
        </div>
    </div>
    <script src="../script/menu.js"></script>
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