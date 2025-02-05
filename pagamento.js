        function selecionarPagamento(metodo) {
            alert("Você selecionou: " + metodo);
            if (metodo === "Cartão de Crédito") {
                document.getElementById("parcelamento").disabled = false;
            } else {
                document.getElementById("parcelamento").disabled = true;
            }
        }