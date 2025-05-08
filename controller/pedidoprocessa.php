<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../DAO/conexaoDAO.php';

// Simulação de login (ou use a sessão real do cliente)
$cliente_id = $_SESSION['id_cliente'] ?? null;
if (!$cliente_id) {
    die("Erro: Cliente não autenticado.");
}

// Dados enviados do formulário
$tamanho_id = $_POST['tamanho'] ?? null;
$acompanhamento_ids = $_POST['acompanhamento'] ?? [];
$pagamento_id = $_POST['pagamento_id'] ?? null;

if (!$tamanho_id || !$pagamento_id) {
    die("Dados incompletos.");
}

// Buscar dados do tamanho (corrigido: idtamanho)
$stmt = $pdo->prepare("SELECT nome, preco FROM tamanho WHERE idtamanho = ?");
$stmt->execute([$tamanho_id]);
$tamanho = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$tamanho) {
    die("Tamanho inválido.");
}

$total = (float)$tamanho['preco'];
$descricao = "Tamanho: " . $tamanho['nome'];

$acompanhamento_nomes = [];

if (!empty($acompanhamento_ids)) {
    $placeholders = implode(',', array_fill(0, count($acompanhamento_ids), '?'));
    
    // Corrigido: idacompanhamento, nomeacompanhamento e precoacompanhamento
    $stmt = $pdo->prepare("SELECT nomeacompanhamento, precoacompanhamento FROM acompanhamento WHERE idacompanhamento IN ($placeholders)");
    $stmt->execute($acompanhamento_ids);
    $acompanhamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($acompanhamentos as $a) {
        $acompanhamento_nomes[] = $a['nomeacompanhamento'];
        $total += (float)$a['precoacompanhamento'];
    }

    if (!empty($acompanhamento_nomes)) {
        $descricao .= " | Acompanhamentos: " . implode(', ', $acompanhamento_nomes);
    }
}

// Inserir o pedido no banco
$stmt = $pdo->prepare("INSERT INTO pedidos (idCli, produtos, total, formadepagamento, data_hora)
                       VALUES (:cliente_id, :produtos, :total, :pagamento_id, NOW())");

$stmt->execute([
    ':cliente_id' => $cliente_id,
    ':produtos' => $descricao,
    ':total' => $total,
    ':pagamento_id' => $pagamento_id
]);

echo "Pedido realizado com sucesso!";
exit;
