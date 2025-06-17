
<!-- esqueci_senha.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Senha | NutriFácil</title>
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
            font-size: 22px;
            color: #2b7a2b;
        }
        .form-container p.sub {
            margin-top: 4px;
            color: #777;
            font-size: 14px;
        }
        .form-container input[type="email"] {
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
        }
        .form-container button:hover {
            background: #256624;
        }
        .form-container .links {
            margin-top: 15px;
            font-size: 13px;
        }
        .form-container .links a {
            color: #007bff;
            text-decoration: none;
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
    <p style="margin:20px 0;font-weight:500;">🔑 Recuperar Senha</p>
    <form method="post">
        <input type="email" name="email" placeholder="Digite seu e-mail" required>
        <button type="submit">Enviar link de recuperação</button>
    </form>
    <div class="links">
        <p>Lembrou a senha? <a href="/login">Fazer login</a></p>
    </div>
</div>
</body>
</html>
