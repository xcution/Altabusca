<?php


// carrega todas as bibliotecas -------------------------------------

include("../../../servidor/dados_do_servidor.php"); // dados do servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// ----------------------------------------------------------------------------


// conecta-se ao banco de dados ----------------------------

conecta_mysql(); // conecta-se ao banco de dados

// ---------------------------------------------------------


// conecta-se ao banco de dados ---------------------------

conecta_banco_dados($banco_dados_nomes_array[3]); // conectando ao banco de dados

// --------------------------------------------------------


// conteudo de pagina -------------------------------------------------

if(retorne_numero_topico_ajuda() == null){
	
header("Location: index.php"); // redireciona para a pagina de index

}else{

$conteudo_pagina = editar_topico_ajuda(); // edita o topico de ajuda

};

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