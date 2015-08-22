<?php


// carrega todas as bibliotecas -------------------------------------

include("../../servidor/dados_do_servidor.php"); // dados do servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// ----------------------------------------------------------------------------


// conecta-se ao banco de dados ----------------------------

conecta_mysql(); // conecta-se ao banco de dados

// ---------------------------------------------------------


// altera o banco de dados de busca inteligente ------------

//somente se for necessario, recebe dados de $_POST

altera_banco_dados_busca_inteligente(); // altera o banco de dados de busca inteligente

// ---------------------------------------------------------


// conteudo de pagina -------------------------------------------------

$conteudo_pagina .= "<div class='conteudo_pagina_adm'>"; // conteudo de pagina
$conteudo_pagina .= carrega_hosts_remover(); // conteudo de pagina
$conteudo_pagina .= "</div>"; // conteudo de pagina

// -----------------------------------------------------------------------------


// adiciona construtor de pagina -----------------------------------

include("montaindex.php"); // adiciona construtor

// ----------------------------------------------------------------------------


// desconecta do banco de dados ---------------------------

desconecta_mysql(); // desconecta do banco de dados

// --------------------------------------------------------


// exibe codigo html ---------------------------------------------------

echo $codigo_html_bruto; // exibe codigo html

// ----------------------------------------------------------------------------


?>