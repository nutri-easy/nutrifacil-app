<?php
if (session_status() === PHP_SESSION_NONE) session_start();

// Limpa apenas os dados da avaliação, sem deslogar o usuário
unset($_SESSION['dados']);

// Redireciona para o início do fluxo nutricional
header('Location: /dados');
exit;