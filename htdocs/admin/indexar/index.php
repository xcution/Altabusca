<?php


// carrega todas as bibliotecas -------------------------------------

include("servidor.php"); // dados de servidor da pasta atual

include("../../servidor/dados_do_servidor.php"); // dados do servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// ----------------------------------------------------------------------------


// altera o banco de dados de busca inteligente --------------

//somente se for necessario, recebe dados de $_POST

altera_banco_dados_busca_inteligente(); // altera o banco de dados de busca inteligente

// -----------------------------------------------------------------------------


// conteudo de pagina -------------------------------------------------

$conteudo_pagina .= "<div class='conteudo_pagina_adm'>"; // conteudo de pagina
$conteudo_pagina .= carregar_servidores_online(); // conteudo de pagina
$conteudo_pagina .= div_gerenciar_hosts_indexar(); // conteudo de pagina
$conteudo_pagina .= monta_div_gerenciar_backup_hosts(); // conteudo de pagina
$conteudo_pagina .= "</div>"; // conteudo de pagina

// -----------------------------------------------------------------------------


// adiciona construtor de pagina -----------------------------------

include("montaindex.php"); // adiciona construtor

// ----------------------------------------------------------------------------


// exibe codigo html ---------------------------------------------------

echo $codigo_html_bruto; // exibe codigo html

// ----------------------------------------------------------------------------


?>