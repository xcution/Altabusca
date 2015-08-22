<?php


// carrega todas as bibliotecas -------------------------------------

include("../../servidor/dados_do_servidor.php"); // dados do servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// ----------------------------------------------------------------------------


// conecta-se ao banco de dados ----------------------------

conecta_mysql(); // conecta-se ao banco de dados

// ---------------------------------------------------------


// seleciona servidor -------------------------------------

conecta_banco_dados($nome_banco_novos_sites_indexar); // conecta ao banco de dados

// --------------------------------------------------------


// query --------------------------------------------------

$query = "delete from tabela_hosts;"; // query

// --------------------------------------------------------


// comando ------------------------------------------------

comando_executa($query); // comando

// --------------------------------------------------------


// mensagem -----------------------------------------------

echo "Hosts da tabela indexar foram apagados!"; // mensagem

// --------------------------------------------------------


// desconecta do banco de dados ---------------------------

desconecta_mysql(); // desconecta do banco de dados

// --------------------------------------------------------


?>