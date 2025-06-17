<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../config.php';

$erro = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = strtolower(trim($_POST['email']));
    $senha = $_POST['senha'];

    $pdo = db_connect();
    // 1) busca usuário
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = ?');
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // 2) grava dados de login
        $_SESSION['usuario']    = $usuario['nome'];
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['telefone'] = $usuario['telefone'];
        $_SESSION['is_admin']   = $usuario['is_admin'] ?? 0;

        // 3) puxa última avaliação daquele usuário
        $stmt = $pdo->prepare("
            SELECT peso, altura, idade, sexo, atividade, objetivo, tempo_meta, dieta, preferencias, alergias
            FROM avaliacoes
            WHERE usuario_id = ?
            ORDER BY id DESC
            LIMIT 1
        ");
        $stmt->execute([ $usuario['id'] ]);
        $av = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($av) {
            // 4) popula sessão com exatamente o que dashboard.php e gerar_dieta.php esperam
            $_SESSION['dados'] = [
                'nome'      => $usuario['nome'],
                'peso'      => (float) $av['peso'],
                'altura'    => (int)   $av['altura'],
                'idade'     => (int)   $av['idade'],
                'sexo'      => $av['sexo'],
                'atividade' => (float) $av['atividade'],
            ];
            $_SESSION['tempo'] = (int) $av['tempo_meta'];
            $_SESSION['dieta'] = $av['dieta'];

            // converte CSV de preferências em array e monta o mesmo formato que você usava
            $prefs = array_map('trim', explode(',', $av['preferencias']));
            $_SESSION['restricoes'] = [
                'Proteínas'    => in_array('Proteínas',    $prefs),
                'Carboidratos' => in_array('Carboidratos', $prefs),
                'Legumes'      => in_array('Legumes',      $prefs),
                'Verduras'     => in_array('Verduras',     $prefs),
                'Frutas'       => in_array('Frutas',       $prefs),
                'alergias'     => array_filter(array_map('trim', explode(',', $av['alergias']))),
                'refeicoes'    => 4,  // ou recupere do banco, se tiver essa coluna
            ];

            // 5) cálculos de IMC, TMB, classificação e água
            $peso_m   = $_SESSION['dados']['peso'];
            $alt_m    = $_SESSION['dados']['altura'] / 100;
            $idade    = $_SESSION['dados']['idade'];
            $sexo     = strtolower($_SESSION['dados']['sexo']);
            $bmr      = $sexo === 'masculino'
                      ? (10*$peso_m + 6.25*$_SESSION['dados']['altura'] - 5*$idade + 5)
                      : (10*$peso_m + 6.25*$_SESSION['dados']['altura'] - 5*$idade - 161);
            $_SESSION['imc']           = round($peso_m / ($alt_m*$alt_m), 1);
            $_SESSION['tmb']           = round($bmr * $_SESSION['dados']['atividade']);
            $_SESSION['classificacao'] = $_SESSION['imc'] < 18.5 ? 'Abaixo do peso'
                                       : ($_SESSION['imc'] < 25   ? 'Peso normal'
                                       : ($_SESSION['imc'] < 30   ? 'Sobrepeso'
                                                                 : 'Obesidade'));
            $_SESSION['agua'] = round($peso_m * 35); // ml/dia

        }

        // 6) redireciona para dashboard ou admin
        if (!empty($_SESSION['is_admin'])) {
            header('Location: /admin');
        } else {
            header('Location: /dashboard');
        }
        exit;
    }

    $erro = "E-mail ou senha inválidos.";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login | NutriFácil</title>
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

        .login-container {
            background: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.08);
            max-width: 420px;
            width: 100%;
            text-align: center;
        }

        .login-container img {
            width: 80px;
            margin-bottom: 15px;
        }

        .login-container h1 {
            margin: 0;
            font-size: 24px;
            color: #2b7a2b;
        }

        .login-container p.sub {
            margin-top: 4px;
            color: #777;
            font-size: 14px;
        }

        .login-container .input-group {
            margin: 20px 0;
            text-align: left;
        }

        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .login-container button {
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

        .login-container button:hover {
            background: #256624;
        }

        .login-container .links {
            margin-top: 15px;
            font-size: 13px;
            color: #555;
        }

        .login-container .links a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }

        .login-container .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="/img/logo.png" alt="NutriFácil">
        <h1>NUTRI<span style="color:#555;">FÁCIL</span></h1>
        <p class="sub">Projeto A3 - Una | 2025</p>

        <p style="margin:20px 0;font-weight:500;">🔒 Faça login para utilizar o App</p>

        <?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>

        <form method="post">
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>

        <div class="links">
            <p>Esqueceu a senha? <a href="/esqueci_senha">Clique aqui</a></p>
            <p>Não tem uma conta? <a href="/cadastro">Cadastre-se</a></p>
            <a href="/ajuda">📕Ajuda</a> | <a href="/lgpd">🔒LGPD</a>

        </div>
    </div>
</body>
</html>
