<?php




// comando para criar a tabela --------------------------------------------------

$campos = null; // limpando campo antigo
$campos = $campos_tabela_pesquisa_geral; // campos de pesquisa

// --------------------------------------------------------------------------------------




// query ------------------------------------------------------------------------------

$query = "create table $tabela_dados[0] ($campos);"; // query

// --------------------------------------------------------------------------------------




// criando tabelas ----------------------------------------------------------------

$comando = comando_executa($query); // executa o comando

// --------------------------------------------------------------------------------------




?>