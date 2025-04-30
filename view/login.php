<?php
session_start();        
require '../controller/clienteprocessa.php';

        // Verifica se o formulário foi enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Executa a função de login
            login(); // Chama a função de login e captura o erro, caso haja.
        }
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/login.css">
    <link rel="stylesheet" href="../estilos/geral.css">
    <title>Login</title>
</head>

<body>

    <header>
        <div class="navbar">
            <span class="menu-toggle">☰</span>
            <div class="menu">
                <a href="../index.html">Início</a>
                <a href="cadastro.php">Cadastrar</a>
            </div>

            <!-- Barra de Pesquisa -->
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Pesquisar..." onkeyup="filtrarProdutos()">
                <button onclick="filtrarProdutos()">🔍</button>
            </div>
        </div>
    </header>
    
    <div class="container">
        <div class="form-image">
            <img src="../img/Ursodologin.jpg" alt="">
        </div>
        
        <?php if (isset($error)): ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <div class="form">
            <form action="login.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Login</h1>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu email" required>
                    </div>
                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="senha" placeholder="Digite sua senha" required>
                    </div>
                    <div class="login-button">
                        <button type="submit">Login</button>
                    </div>
                </div>
            </form>
            
            <!-- Botão de Cadastro -->
            <div class="cadastro-button">
    <h6>Ainda não possui conta? <a href="cadastro.php">Clique aqui</a></h6>
</div>

        </div>
    </div>

    <script src="../Script/menu.js"></script>
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
