<?php


// dados de servidor e bibliotecas -----------------------------------------

include("servidor/dados_do_servidor.php"); // dados de servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// ------------------------------------------------------------------------------------


// altera o banco de dados de busca inteligente ----------------------

//somente se for necessario, recebe dados de $_POST

altera_banco_dados_busca_inteligente(); // altera o banco de dados de busca inteligente

// ------------------------------------------------------------------------------------


// converte para minusculo -------------------------------------------------

$busca_exata = strtolower($busca_exata); // converte para minusculo

// -------------------------------------------------------------------------------------


// busca exata em caso de nulo -------------------------------------------

if($busca_exata == null){

$busca_exata = 1; // busca exata em caso de nulo

};

// -------------------------------------------------------------------------------------


// conecta-se ao mysql --------------------------------------------------------

conecta_mysql(); // conecta-se ao mysql

// --------------------------------------------------------------------------------------


// busca inteligente --------------------------------------------------------------

include("busca_inteligente.php"); // busca inteligente

// --------------------------------------------------------------------------------------


// monta a pagina inicial --------------------------------------------------------

echo monta_pagina_inicial(); // monta a pagina inicial

// --------------------------------------------------------------------------------------


// desconecta mysql ------------------------------------------------------------

desconecta_mysql(); // desconecta do mysql

// --------------------------------------------------------------------------------------


?>