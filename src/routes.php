<?php
if (session_status() === PHP_SESSION_NONE) session_start();


$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
switch ($path) {
    // Página pública
    case '':
    case 'home': include __DIR__ . '/controllers/home.php'; break;

    // Autenticação
    case 'login': include __DIR__ . '/controllers/login.php'; break;
    case 'cadastro': include __DIR__ . '/controllers/cadastro.php'; break;
    case 'ajuda': include __DIR__ . '/controllers/ajuda.php'; break;
    case 'lgpd': include __DIR__ . '/controllers/lgpd.php'; break;
    case 'esqueci_senha': include __DIR__ . '/controllers/esqueci_senha.php'; break;
    case 'logout': include __DIR__ . '/controllers/logout.php'; break;

    // Avaliação e fluxo nutricional
    case 'dados': include __DIR__ . '/controllers/dados.php'; break;
    case 'gerar_dieta': include __DIR__ . '/controllers/gerar_dieta.php'; break;
    case 'resumo_dieta': include __DIR__ . '/controllers/resumo_dieta.php'; break;
    case 'pagamento': include __DIR__ . '/controllers/pagamento.php'; break;
    case 'pagamento_opcoes':include __DIR__ . '/../public/pagamento_opcoes.php'; break;
    case 'envio_dieta': include __DIR__ . '/controllers/envio_dieta.php'; break;
    case 'resumo_dados': include __DIR__ . '/controllers/resumo_dados.php'; break;
    case 'gerar_pdf': include __DIR__ . '/controllers/gerar_pdf.php'; break;

    // Painel
    
    case 'dashboard': include __DIR__ . '/controllers/dashboard.php'; break;
    case 'refazer': include __DIR__ . '/controllers/refazer.php'; break;
    case 'suporte': include __DIR__ . '/controllers/suporte.php'; break;
    case 'historico': include __DIR__ . '/controllers/historico.php'; break;
    case 'conteudos': include __DIR__ . '/controllers/conteudos.php'; break;
    case 'receitas': include __DIR__ . '/controllers/receitas.php'; break;
    case 'resumo_dieta': include __DIR__ . '/controllers/resumo_dieta.php'; break;
    case 'envio_dieta': include __DIR__ . '/controllers/envio_dieta.php'; break;
    case 'visualizar_dieta': include __DIR__ . '/controllers/visualizar_dieta.php'; break;
    case 'admin': include __DIR__ . '/controllers/admin.php'; break;
    case 'editar_usuario': include __DIR__ . '/controllers/editar_usuario.php'; break;

    default: 
        http_response_code(404);
        echo 'Página não encontrada.';
}
