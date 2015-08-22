<?php




// comando para criar a tabela --------------------------------------------------

$campos = null; // limpando campo antigo
$campos .= "id int not null auto_increment primary key, "; // campos de pesquisa
$campos .= "host_site text, "; // campos de pesquisa
$campos .= "tipo_host text"; // campos de pesquisa

// --------------------------------------------------------------------------------------




// query ------------------------------------------------------------------------------

$query = "create table $tabela_dados[0] ($campos);"; // query

// --------------------------------------------------------------------------------------




// criando tabelas ----------------------------------------------------------------

$comando = comando_executa($query); // executa o comando

// --------------------------------------------------------------------------------------




?>