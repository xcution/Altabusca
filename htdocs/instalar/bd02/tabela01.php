<?php




// comando para criar a tabela ------------------------------

$campos = null; // limpando campo antigo
$campos = "host_site text"; // campos da tabela

// --------------------------------------------------------------------




// query ------------------------------------------------------------

$query = "create table $nome_prefixo_tabela_novo_host ($campos);"; // query

// --------------------------------------------------------------------




// criando tabelas ----------------------------------------------

$comando = comando_executa($query); // executa o comando

// ------------------------------------------------------------------




?>