<?php


// remove host --------------------------------------------

function remove_host(){


// tabela de banco de dados -------------------------------

global $tabela_dados; // tabela de banco de dados

// --------------------------------------------------------


// nome do banco de dados indexados -----------------------

$nome_banco  = mudar_banco_dados(null); // nome do banco de dados indexados

// --------------------------------------------------------


// conecta ao banco de dados ------------------------------

conecta_banco_dados($nome_banco); // conecta ao banco de dados

// --------------------------------------------------------


// host de site -------------------------------------------

$host_site = remove_html($_POST['host_site']); // host de site

// --------------------------------------------------------


// query --------------------------------------------------

$query = "delete from $tabela_dados[0] where host_site='$host_site';"; // query

// --------------------------------------------------------


// executa query ------------------------------------------

comando_executa($query); // executa query

// --------------------------------------------------------


};

// --------------------------------------------------------


?>