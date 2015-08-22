<?php


// campo select altera o tipo de banco de dados ---------

function campo_select_altera_banco_dados(){


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


case $banco_dados_nomes_array[1]: // opcao
$opcao[1] = "selected"; // selecionado
break;


case $banco_dados_nomes_array[2]: // opcao
$opcao[2] = "selected"; // selecionado
break;


case $banco_dados_nomes_array[4]: // opcao
$opcao[3] = "selected"; // selecionado
break;


case $banco_dados_nomes_array[5]: // opcao
$opcao[4] = "selected"; // selecionado
break;


case $banco_dados_nomes_array[6]: // opcao
$opcao[5] = "selected"; // selecionado
break;


case $banco_dados_nomes_array[7]: // opcao
$opcao[6] = "selected"; // selecionado
break;


case $banco_dados_nomes_array[8]: // opcao
$opcao[7] = "selected"; // selecionado
break;


};

// --------------------------------------------------------


// monta campo select ---------------------------

$campo_select .= "Banco de dados: "; // campo select
$campo_select .= "<select class='modo_pesquisa' id='campo_select_tipo_busca_dados' onchange='muda_banco_dados(this);'>"; // campo select
$campo_select .= "<option value='0' $opcao[0]>Produtos</option>"; // campo select
$campo_select .= "<option value='1' $opcao[1]>Hosts</option>"; // campo select
$campo_select .= "<option value='2' $opcao[2]>Indexar</option>"; // campo select
$campo_select .= "<option value='4' $opcao[3]>Jogos</option>"; // campo select
$campo_select .= "<option value='5' $opcao[4]>Aplicativos</option>"; // campo select
$campo_select .= "<option value='6' $opcao[5]>Notícias</option>"; // campo select
$campo_select .= "<option value='7' $opcao[6]>Sistemas operacionais</option>"; // campo select
$campo_select .= "<option value='8' $opcao[7]>Backups</option>"; // campo select
$campo_select .= "</select>"; // campo select

// -------------------------------------------------------


// adiciona div especial ----------------------------------

$campo_select = div_especial_basica_campos($campo_select); // adiciona div especial

// --------------------------------------------------------


// retorno --------------------------------------------

return $campo_select; // retorno

// -------------------------------------------------------


};

// -------------------------------------------------------


?>