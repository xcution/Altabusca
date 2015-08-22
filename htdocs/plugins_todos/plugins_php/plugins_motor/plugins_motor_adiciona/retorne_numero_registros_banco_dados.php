<?php


// retorna o numero de registros no banco de dados --------

function retorne_numero_registros_banco_dados($nome_banco_dados){




// conecta-se ao banco de dados ----------------------------------

conecta_banco_dados($nome_banco_dados); // conecta-se ao banco de dados

// ------------------------------------------------------------------------------




// tabela salvar site ------------------------------------------------------

$tabela = retorne_tabela_salvar_site(); // tabela salvar site

// ------------------------------------------------------------------------------




// query ---------------------------------------------------------------------

$query = "select *from $tabela;"; // query

// ------------------------------------------------------------------------------




// retorno -------------------------------------------------------------------

return retorne_numero_linhas_query($query); // retorno

// ------------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------


?>