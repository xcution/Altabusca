<?php


// carrega todas as bibliotecas ---------------------------

include("../../../servidor/dados_do_servidor.php"); // dados do servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// --------------------------------------------------------


// conecta-se ao banco de dados ----------------------------

conecta_mysql(); // conecta-se ao banco de dados

// ---------------------------------------------------------


// seleciona banco de dados -------------------------------

conecta_banco_dados($banco_dados_nomes_array[3]); // seleciona banco de dados

// --------------------------------------------------------


// conteudo de pagina -------------------------------------

$conteudo_pagina = gerencia_publicacoes(); // conteudo de pagina

// --------------------------------------------------------


// adiciona construtor de pagina --------------------------

include("montaindex.php"); // adiciona construtor

// --------------------------------------------------------


// desconecta do banco de dados ---------------------------

desconecta_mysql(); // desconecta do banco de dados

// --------------------------------------------------------


// exibe codigo html --------------------------------------

echo $codigo_html_bruto; // exibe codigo html

// --------------------------------------------------------


?>