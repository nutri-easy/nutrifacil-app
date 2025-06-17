<?php
if (session_status() === PHP_SESSION_NONE) session_start();

require_once __DIR__ . '/../config.php';

$erro = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = strtolower(trim($_POST['email']));
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $telefone = trim($_POST['telefone']);

    try {
        $pdo = db_connect();

        // Verifica se e-mail já existe
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $erro = "E-mail já cadastrado.";
        } else {
            // Cadastra novo usuário
            $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, telefone) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nome, $email, $senha, $telefone]);

            $usuario_id = $pdo->lastInsertId();

            // Inicia sessão
            $_SESSION['usuario'] = $nome;
            $_SESSION['usuario_id'] = $usuario_id;
            $_SESSION['is_admin'] = 0;
            $_SESSION['telefone'] = $telefone;
            $_SESSION['email'] = $email;

            // Redireciona para /dados
            header("Location: /dados");
            exit;
        }

    } catch (Exception $e) {
        $erro = "Erro no cadastro: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro | NutriFácil</title>
    <link rel="stylesheet" href="/css/style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f7f9fb;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .form-container {
            background: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.08);
            max-width: 420px;
            width: 100%;
            text-align: center;
        }
        .form-container img {
            width: 80px;
            margin-bottom: 15px;
        }
        .form-container h1 {
            margin: 0;
            font-size: 24px;
            color: #2b7a2b;
        }
        .form-container p.sub {
            margin-top: 4px;
            color: #777;
            font-size: 14px;
        }
        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"],
        .form-container input[type="tel"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }
        .form-container button {
            width: 100%;
            background: #2b7a2b;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }
        .form-container button:hover {
            background: #256624;
        }
        .form-container .links {
            margin-top: 15px;
            font-size: 13px;
            color: #555;
        }
        .form-container .links a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }
        .form-container .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="form-container">
    <img src="/img/logo.png" alt="NutriFácil">
    <h1>NUTRI<span style="color:#555">FÁCIL</span></h1>
    <p class="sub">Projeto A3 - Una | 2025</p>
    <p style="margin:20px 0;font-weight:500;">📝 Cadastro</p>

    <?php if ($erro): ?>
        <p style="color:red;"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="nome" placeholder="Nome completo" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="tel" name="telefone" placeholder="Número de WhatsApp" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Cadastrar</button>
    </form>
    <div class="links">
        <p>Já tem uma conta? <a href="/login">Entrar</a></p>
    </div>
</div>
</body>
</html>
