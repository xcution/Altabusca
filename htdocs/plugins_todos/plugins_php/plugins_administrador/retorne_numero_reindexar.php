<?php


// retorne o numero de hosts a serem reindexados ----------

function retorne_numero_reindexar(){


// globals ------------------------------------------------

global $tabela_dados; // tabela de banco de dados

// --------------------------------------------------------


// valida banco de dados ----------------------------------

if(mudar_banco_dados(null) == null){

return null; // retorno nulo

};

// --------------------------------------------------------


// query --------------------------------------------------

$query = "select *from $tabela_dados[0];"; // query

// --------------------------------------------------------


// retorno ------------------------------------------------

return retorne_numero_linhas_query($query); // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>