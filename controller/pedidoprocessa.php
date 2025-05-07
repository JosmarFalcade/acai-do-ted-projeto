<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../controller/conexao.php';

// Simulação de login (ou use a sessão real do cliente)
$cliente_id = $_SESSION['cliente_id'] ?? 1;

// Dados enviados do formulário
$tamanho_id = $_POST['tamanho'] ?? null;
$acompanhamento_ids = $_POST['acompanhamentos'] ?? [];
$pagamento_id = $_POST['pagamento_id'] ?? null;

if (!$tamanho_id || !$pagamento_id) {
    die("Dados incompletos.");
}

// Buscar dados do tamanho
$stmt = $pdo->prepare("SELECT nome, preco FROM tamanhos WHERE id = ?");
$stmt->execute([$tamanho_id]);
$tamanho = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$tamanho) {
    die("Tamanho inválido.");
}

$total = (float)$tamanho['preco'];
$descricao = "Tamanho: " . $tamanho['nome'];

// Buscar dados dos acompanhamentos (se houver)
$acompanhamento_nomes = [];

if (!empty($acompanhamento_ids)) {
    $placeholders = implode(',', array_fill(0, count($acompanhamento_ids), '?'));
    $stmt = $pdo->prepare("SELECT nome, preco FROM acompanhamentos WHERE id IN ($placeholders)");
    $stmt->execute($acompanhamento_ids);
    $acompanhamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($acompanhamentos as $a) {
        $acompanhamento_nomes[] = $a['nome'];
        $total += (float)$a['preco'];
    }

    if (!empty($acompanhamento_nomes)) {
        $descricao .= " | Acompanhamentos: " . implode(', ', $acompanhamento_nomes);
    }
}

// Inserir o pedido no banco
$stmt = $pdo->prepare("INSERT INTO pedidos (cliente_id, produtos, total, pagamento_id, data_hora)
                       VALUES (:cliente_id, :produtos, :total, :pagamento_id, NOW())");

$stmt->execute([
    ':cliente_id' => $cliente_id,
    ':produtos' => $descricao,
    ':total' => $total,
    ':pagamento_id' => $pagamento_id
]);

exit;
