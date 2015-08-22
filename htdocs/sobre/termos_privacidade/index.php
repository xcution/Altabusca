<?php


// carrega todas as bibliotecas ---------------------------

include("../../servidor/dados_do_servidor.php"); // dados do servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// --------------------------------------------------------


// conecta-se ao banco de dados ---------------------------

conecta_mysql(); // conecta-se ao banco de dados

// --------------------------------------------------------


// conteudo de pagina -------------------------------------

$conteudo_pagina .= "<div class='div_titulo_campos_gerais'>"; // conteudo de pagina
$conteudo_pagina .= "Termos e privacidade do $nome_do_sistema"; // conteudo de pagina
$conteudo_pagina .= "</div>"; // conteudo de pagina
$conteudo_pagina .= $termos_privacidade_site; // conteudo de pagina

// --------------------------------------------------------


// adiciona construtor de pagina --------------------------

$codigo_html_bruto = monta_pagina_basica($conteudo_pagina); // constroe a pagina

// --------------------------------------------------------


// desconecta do banco de dados ---------------------------

desconecta_mysql(); // desconecta do banco de dados

// --------------------------------------------------------


// exibe codigo html --------------------------------------

echo $codigo_html_bruto; // exibe codigo html

// --------------------------------------------------------


?>