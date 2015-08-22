<?php


// cadastra novo host a ser indexado futuramente ----------------

function cadastra_novo_host_indexar($endereco_host){




// nome de prefixo de tabela --------------------------------------------

global $conexao_mysql_conectar; // variavel de conexao

global $nome_banco_novos_hosts; // nome de prefixo de banco de dados

global $nome_prefixo_tabela_novo_host; // nome de prefixo de tabela

global $numero_maximo_registros_busca_inteligente; // numero de hosts por tabela

global $nome_banco; // banco de dados de sites

// ------------------------------------------------------------------------------




// banco de dados ----------------------------------------------------------

$banco_dados = mysql_select_db($nome_banco_novos_hosts, $conexao_mysql_conectar); // banco de dados 

// ------------------------------------------------------------------------------




// informa numero de novos hosts cadastrados --------------------

$numero_hosts_novos_cadastrados = retorna_numero_novos_hosts_indexar($conexao_mysql_conectar); // informa numero de novos hosts cadastrados

// ------------------------------------------------------------------------------




// query ----------------------------------------------------------------------

$query[1] = "select *from $nome_prefixo_tabela_novo_host where host_site='$endereco_host';"; // query

$query[2] = "insert into $nome_prefixo_tabela_novo_host values('$endereco_host');"; // query

// ------------------------------------------------------------------------------




// executa comando --------------------------------------------------------

$comando = comando_executa($query[1], $conexao_mysql_conectar);; // executa comando

// ------------------------------------------------------------------------------




// numero de linhas --------------------------------------------------------

$numero_linhas = mysql_num_rows($comando); // numero de linhas

// ------------------------------------------------------------------------------




// executa comando ------------------------------------------------------

if($endereco_host != null and $numero_linhas == 0 and $numero_maximo_registros_busca_inteligente > $numero_hosts_novos_cadastrados){


$comando = comando_executa($query[2], $conexao_mysql_conectar); // executa comando


};

// ------------------------------------------------------------------------------




// seleciona banco de dados --------------------------------------------

mysql_select_db($nome_banco); // seleciona banco de dados

// --------------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------


?>