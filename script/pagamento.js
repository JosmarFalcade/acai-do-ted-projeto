function selecionarPagamento(metodo) {
    alert("Você selecionou: " + metodo);
    document.getElementById("pagar").style.display = "block";
}

function realizarPagamento() {
    // Exibe a mensagem de pagamento
    document.getElementById("mensagem").textContent = "Pago!";
    document.getElementById("mensagem").style.display = "block";

    // Redireciona para a página index após 2 segundos
    setTimeout(function() {
        window.location.href = "../index.html";
    }, 2000); // 2 segundos
}
