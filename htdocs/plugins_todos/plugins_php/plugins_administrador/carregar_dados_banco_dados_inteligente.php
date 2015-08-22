<?php


// carrega dados de banco de dados de busca inteligente ----

function carregar_dados_banco_dados_inteligente($nome_banco_dados){




// globals ------------------------------------------------------------------

global $nome_prefixo_tabela_novo_host; // tabela de hosts

// ----------------------------------------------------------------------------




// seleciona banco de dados ----------------------------------------

mysql_select_db($nome_banco_dados); // seleciona banco de dados

// ----------------------------------------------------------------------------




// query --------------------------------------------------------------------

$query = "select *from $nome_prefixo_tabela_novo_host;"; // query

// ----------------------------------------------------------------------------




// comando --------------------------------------------------------------

$comando = comando_executa($query); // comando

// ----------------------------------------------------------------------------




// numero de linhas ----------------------------------------------------

$numero_linhas = mysql_num_rows($comando); // numero de linhas

// ----------------------------------------------------------------------------




// conteudo de retorno --------------------------------------------------

$conteudo_retorno .= "<span class='label label-primary'>"; // conteudo de retorno
$conteudo_retorno .= $numero_linhas; // conteudo de retorno
$conteudo_retorno .= "</span>"; // conteudo de retorno

// ----------------------------------------------------------------------------




// retorno ------------------------------------

return $conteudo_retorno; // retorno

// ----------------------------------------------




};

// --------------------------------------------------------------------------


?>