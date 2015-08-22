<?php


// carrega e lista todas as funcoes ----------------------------

$endereco_de_pasta_funcoes_css = $pasta_plugins_css; // endereço de pasta de funcoes

$arquivos = retorna_arquivos_pasta($endereco_de_pasta_funcoes_css, ".css"); // arquivos a serem listados

// --------------------------------------------------------------------------


// quanditade de arquivos encontrados -----------------------

$contador = 0; // contador

$quantidade_de_arquivos = count($arquivos); // quantidade de arquivos php encontrados

// --------------------------------------------------------------------------


// listando --------------------------------------------------------------

for($contador == $contador; $contador <= $quantidade_de_arquivos; $contador++){


// endereço de codigo php ----------------------------------------

$endereco_de_arquivo = $arquivos[$contador]; // endereço de arquivo php

// --------------------------------------------------------------------------


// lendo conteudo de cada arquivo -----------------------------

if($endereco_de_arquivo != null){

$conteudo_arquivo_css .= file_get_contents($endereco_de_arquivo); // lendo conteudo de cada arquivo

};

// --------------------------------------------------------------------------


};

// --------------------------------------------------------------------------


// remove linhas em branco --------------------------------------

$conteudo_arquivo_css = remove_linhas_em_branco($conteudo_arquivo_css); // remove linhas em branco

// -------------------------------------------------------------------------


// remove comentarios --------------------------------------------

$conteudo_arquivo_css = remove_comentarios($conteudo_arquivo_css); // remove comentarios

// -------------------------------------------------------------------------


// salvando arquivo -------------------------------------------------

func_salvar_arquivo($arquivos_sistema[0], $conteudo_arquivo_css); // salvando arquivo

// -------------------------------------------------------------------------


// limpa todas as variaveis ---------------------------------------

$conteudo_arquivo_css = null; // conteudo de arquivo csss

$endereco_de_pasta_funcoes_css = null; // endereco da pasta de funcoes

// --------------------------------------------------------------------------


?>
