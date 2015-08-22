<?php


// campo select muda tipo de busca ---------

function campo_select_muda_tipo_busca(){


// globals ----------------------------------------------

global $banco_dados_nomes_array; // banco de dados

// --------------------------------------------------------


// dados sessao ------------------------------------

$dados_select_sessao = mudar_banco_dados(null); // dados sessao

// --------------------------------------------------------


// seleciona opcao atual -------------------------

switch($dados_select_sessao){


case $banco_dados_nomes_array[0]: // opcao
$opcao[0] = "selected"; // selecionado
break;


case $banco_dados_nomes_array[4]: // opcao
$opcao[1] = "selected"; // selecionado
break;


case $banco_dados_nomes_array[5]: // opcao
$opcao[2] = "selected"; // selecionado
break;


case $banco_dados_nomes_array[6]: // opcao
$opcao[3] = "selected"; // selecionado
break;


case $banco_dados_nomes_array[7]: // opcao
$opcao[4] = "selected"; // selecionado
break;


};

// --------------------------------------------------------


// monta campo select ---------------------------

$campo_select .= "<select class='modo_pesquisa' id='campo_select_tipo_busca_dados' onchange='muda_banco_dados(this);'>"; // campo select
$campo_select .= "<option value='0' $opcao[0]>Produtos</option>"; // campo select
$campo_select .= "<option value='4' $opcao[1]>Jogos</option>"; // campo select
$campo_select .= "<option value='5' $opcao[2]>Aplicativos</option>"; // campo select
$campo_select .= "<option value='6' $opcao[3]>Notícias</option>"; // campo select
$campo_select .= "<option value='7' $opcao[4]>Sistemas operacionais</option>"; // campo select
$campo_select .= "</select>"; // campo select

// -------------------------------------------------------


// retorno --------------------------------------------

return $campo_select; // retorno

// -------------------------------------------------------


};

// -------------------------------------------------------


?>