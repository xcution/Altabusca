<?php




// criando banco de dados ----------------------------------------------

$query = "create database $banco_dados_nomes_array[5] DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;"; // query para criar banco de dados

$comando = comando_executa($query); // criando banco de dados

// ----------------------------------------------------------------------------




// seleciona banco de dados ------------------------------------------

conecta_banco_dados($banco_dados_nomes_array[5]); // seleciona banco de dados

// ----------------------------------------------------------------------------




// criando tabelas --------------------------------------------------------

include("tabela01.php"); // tabela

// ----------------------------------------------------------------------------




?>