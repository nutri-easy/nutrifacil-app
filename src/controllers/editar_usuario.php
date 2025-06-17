<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../config.php';

// Verifica se o usuário está logado e é admin
if (!isset($_SESSION['usuario']) || empty($_SESSION['is_admin'])) {
    header('Location: /login');
    exit;
}

$pdo = db_connect();

// Carregar dados do usuário
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
    $usuario = $stmt->fetch();

    if (!$usuario) {
        echo "Usuário não encontrado.";
        exit;
    }
}

// Atualizar dados do usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $is_admin = isset($_POST['is_admin']) ? 1 : 0;

    $stmt = $pdo->prepare("UPDATE usuarios SET nome = ?, email = ?, is_admin = ? WHERE id = ?");
    $stmt->execute([$nome, $email, $is_admin, $id]);

    header('Location: /admin');
    exit;
}
?>

<h2 style="text-align:center;">✏️ Editar Usuário</h2>
<div style="max-width: 500px; margin: auto; background: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 0 10px #ccc;">
    <form method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required style="width:100%;padding:10px;margin-bottom:10px;">

        <label>E-mail:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required style="width:100%;padding:10px;margin-bottom:10px;">

        <label><input type="checkbox" name="is_admin" <?= $usuario['is_admin'] ? 'checked' : '' ?>> Administrador</label>

        <button type="submit" style="width:100%;padding:12px;background:#2b7a2b;color:white;border:none;border-radius:5px;font-weight:bold;margin-top:15px;">Salvar</button>
    </form>
</div>

<?php include __DIR__ . '/../../templates/footer.php'; ?>
