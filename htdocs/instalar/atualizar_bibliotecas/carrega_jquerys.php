<?php


// carrega e lista todas as funcoes ----------------------------------

$endereco_de_pasta_funcoes_jquerys = $pasta_plugins_jquery; // endereço de pasta de funcoes

$arquivos = retorna_arquivos_pasta($endereco_de_pasta_funcoes_jquerys, ".js"); // listando somente arquivos

// ------------------------------------------------------------------------------


// quanditade de arquivos encontrados ---------------------------

$contador = 0; // contador

$quantidade_de_arquivos = count($arquivos); // quantidade de arquivos php encontrados

// ------------------------------------------------------------------------------


// listando ------------------------------------------------------------------

for($contador == $contador; $contador <= $quantidade_de_arquivos; $contador++){


// endereço de codigo php -------------------------------------------

$endereco_de_arquivo = $arquivos[$contador]; // endereço de arquivo php

// -----------------------------------------------------------------------------


// lendo conteudo de cada arquivo --------------------------------

if($endereco_de_arquivo != null){

$conteudo_arquivo_jquery .= file_get_contents($endereco_de_arquivo); // lendo conteudo de cada arquivo

};

// ----------------------------------------------------------------------------


};

// ----------------------------------------------------------------------------


// remove linhas em branco ----------------------------------------

$conteudo_arquivo_jquery = remove_linhas_em_branco($conteudo_arquivo_jquery); // remove linhas em branco

// ----------------------------------------------------------------------------


// remove comentarios -----------------------------------------------

$conteudo_arquivo_jquery = remove_comentarios($conteudo_arquivo_jquery); // remove comentarios

// ----------------------------------------------------------------------------


// salvando arquivo -----------------------------------------------------

func_salvar_arquivo($arquivos_sistema[1], $conteudo_arquivo_jquery); // salvando arquivo

// -----------------------------------------------------------------------------


// limpa todas as variaveis --------------------------------------------

$conteudo_arquivo_jquery = null; // conteudo de arquivo jquerys

$endereco_de_pasta_funcoes_jquerys = null; // endereco da pasta de funcoes

// ------------------------------------------------------------------------------


?>
