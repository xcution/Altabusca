<?php


// retorna se o host informado existe na tabela de indexar hosts --

function retorne_host_tabela_indexar_existe($host_site){




// globals ------------------------------------------------------------------

global $nome_prefixo_tabela_novo_host; // nome de prefixo de tabela

// ----------------------------------------------------------------------------




// query --------------------------------------------------------------------

$query = "select *from $nome_prefixo_tabela_novo_host where host_site='$host_site';"; // query

// ----------------------------------------------------------------------------




// comando --------------------------------------------------------------

$comando = comando_executa($query); // comando

// ----------------------------------------------------------------------------




// numero de linhas ----------------------------------------------------

$numero_linhas = mysql_num_rows($comando); // numero de linhas

// ----------------------------------------------------------------------------




// retorno ------------------------------------------------------------------

if($numero_linhas > 0){


return true; // esta cadastrado


}else{


return false; // nao esta cadastrado


};

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------


?>