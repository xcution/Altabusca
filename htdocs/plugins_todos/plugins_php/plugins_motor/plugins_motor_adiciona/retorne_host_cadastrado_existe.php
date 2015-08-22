<?php


// retorne se o host ja esta cadastrado ------------------------

function retorne_host_cadastrado_existe($host_site){




// tabela para salvar o site ------------------------------------------

$tabela_salvar_site = retorne_tabela_salvar_site(); // tabela para salvar o site

// ----------------------------------------------------------------------------




// query --------------------------------------------------------------------

$query = "select *from $tabela_salvar_site where host_site='$host_site';"; // query

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