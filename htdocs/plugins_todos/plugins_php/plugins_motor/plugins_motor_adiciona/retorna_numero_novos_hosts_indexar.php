<?php


// retorna o numero de novos hosts a indexar ------------------------------

function retorna_numero_novos_hosts_indexar($conexao_mysql_conectar){




// nome de prefixo de tabela --------------------------------------------

global $nome_prefixo_tabela_novo_host; // nome de prefixo de tabela

// ----------------------------------------------------------------------------




// query --------------------------------------------------------------------

$query = "select *from $nome_prefixo_tabela_novo_host;"; // query

// ----------------------------------------------------------------------------




// executa comando --------------------------------------------------------

$comando = comando_executa($query, $conexao_mysql_conectar); // executa comando

// ------------------------------------------------------------------------------




// numero de linhas --------------------------------------------------------

$numero_linhas = mysql_num_rows($comando); // numero de linhas

// ------------------------------------------------------------------------------




// retorno --------------------------------------------------------------------

return $numero_linhas; // retorno

// ------------------------------------------------------------------------------




};

// --------------------------------------------------------------------------------------


?>