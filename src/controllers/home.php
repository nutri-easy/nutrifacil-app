
<?php
if (session_status() === PHP_SESSION_NONE) session_start();

// Se o usuário já está logado, redireciona para o painel correto
if (isset($_SESSION['usuario'])) {
    if (!empty($_SESSION['is_admin'])) {
        header('Location: /admin');
    } else {
        header('Location: /dashboard');
    }
    exit;
} else {
    // Se não estiver logado, redireciona para a página de login
    header('Location: /login');
    exit;
}





