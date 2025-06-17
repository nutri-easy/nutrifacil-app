<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../config.php';

$pdo = db_connect();

// Adicionar alimento
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'], $_POST['quantidade'], $_POST['calorias'])) {
    $nome = trim($_POST['nome']);
    $quantidade = trim($_POST['quantidade']);
    $calorias = floatval($_POST['calorias']);

    if ($nome && $quantidade && $calorias > 0) {
        $stmt = $pdo->prepare("INSERT INTO alimentos (nome, quantidade, calorias) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $quantidade, $calorias]);
    }
    header("Location: /admin_alimentos");
    exit;
}


// Remover alimento
if (isset($_GET['remover'])) {
    $id = intval($_GET['remover']);
    $stmt = $pdo->prepare("DELETE FROM alimentos WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: /admin_alimentos");
    exit;
}

// Buscar lista
<li>
    <?= htmlspecialchars($a['nome']) ?> - <?= $a['quantidade'] ?> (<?= $a['calorias'] ?> kcal)
</li>

?>

<div style="max-width:600px;margin:30px auto;background:#fff;padding:25px;border-radius:10px;box-shadow:0 0 10px #ccc;">
    <h2 style="text-align:center;">🛠️ Painel de Alimentos</h2>

    <form method="post" style="margin-bottom:20px;">
        <input type="text" name="nome" placeholder="Nome do alimento" required style="...">
        <input type="text" name="quantidade" placeholder="Quantidade (ex: 100g, 1 un)" required style="...">
        <input type="number" name="calorias" placeholder="Calorias (kcal)" step="0.01" required style="...">
        <button type="submit" style="...">Adicionar Alimento</button>
    </form>


    <h3>📋 Lista de Alimentos</h3>
    <ul style="padding-left: 20px;">
        <?php foreach ($alimentos as $a): ?>
            <li style="margin-bottom:5px;">
                <?= htmlspecialchars($a['nome']) ?> (<?= $a['calorias'] ?> kcal)
                <a href="?remover=<?= $a['id'] ?>" onclick="return confirm('Remover este alimento?')" style="color:#c00;font-weight:bold;margin-left:10px;">✖</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php include __DIR__ . '/../../templates/footer.php'; ?>
