<?php


// carrega o logotipo ---------------------------------------------------

include("../logotipo/logotipo.php"); // logotipo

// ----------------------------------------------------------------------------


// codigo fonte de todos os scripts PHP ------------------------

$codigo_fonte_scripts_php_todos = null; // codigo fonte de todos os scripts PHP

// ----------------------------------------------------------------------------


// criando pasta se nao existir --------------------------------------

criar_pasta($pasta_compilados); // criando pasta caso nao exista

// ----------------------------------------------------------------------------


// lista e carrega todas as bibliotecas disponiveis ------------

include("carrega_funcoes_php.php"); // carrega php principal antes de todas

include("carrega_plugins_php.php"); // carrega php principal antes de todas

include("carrega_jquerys.php"); // todos os scripts basicos do jquery do site

include("carrega_scripts_css.php"); // compilando scripts css do site

include("extra_css.php"); // plugins extra css

include("extra_js.php"); // plugins extra js

// -----------------------------------------------------------------------------



// salva bibliotecas php ---------------------------------------

$codigo_salvar_biblioteca_php .= "<?php"; // codigo para salvar biblioteca php
$codigo_salvar_biblioteca_php .= $codigo_fonte_scripts_php_todos; // codigo para salvar biblioteca php
$codigo_salvar_biblioteca_php .= "?>"; // codigo para salvar biblioteca php

// ----------------------------------------------------------------------------


// remove espacos em branco -------------------------------------

$codigo_salvar_biblioteca_php = remove_linhas_em_branco($codigo_salvar_biblioteca_php); // removendo espacos em branco

// ----------------------------------------------------------------------------


// remove comentarios -----------------------------------------------

$codigo_salvar_biblioteca_php = remove_comentarios($codigo_salvar_biblioteca_php); // remove comentarios

// ---------------------------------------------------------------------------


// salvando bibliotecas php ----------------------------------------

func_salvar_arquivo($arquivos_sistema[2], $codigo_salvar_biblioteca_php); // salvando bibliotecas php

// --------------------------------------------------------------------------


// codigo fonte de todos os scripts PHP ------------------------

$codigo_fonte_scripts_php_todos = null; // codigo fonte de todos os scripts PHP

// ----------------------------------------------------------------------------


?>
