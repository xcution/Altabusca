<?php




// define a timezone ----------------------------------

date_default_timezone_set('America/Sao_Paulo'); // define a timezone

// -----------------------------------------------------------




// pasta root do servidor ----------------------------

$pasta_root_servidor = $_SERVER['DOCUMENT_ROOT']; // pasta root do servidor

$url_do_servidor = "http://".$_SERVER['SERVER_NAME']; // url do servidor

// ----------------------------------------------------------




// nome de pasta plugins compilados ---------

$nome_pasta_plugins_compilados = "plugins_compilados"; // nome de pasta plugins compilados

// ----------------------------------------------------------




// pasta plugins gerais -----------------------------

$plugins_todos = $_SERVER['DOCUMENT_ROOT']."/plugins_todos/"; // pasta plugins gerais

// ---------------------------------------------------------




// pasta de funcoes ---------------------------------

$pasta_funcoes = $_SERVER['DOCUMENT_ROOT']."/funcoes/"; // pasta de funcoes

// ---------------------------------------------------------




// pasta plugins compilados ---------------------

$pasta_compilados = $_SERVER['DOCUMENT_ROOT']."/$nome_pasta_plugins_compilados/"; // pasta plugins compilados

// ---------------------------------------------------------




// pasta logotipo -------------------------------------

$pasta_logotipo = $_SERVER['DOCUMENT_ROOT']."/logotipo/"; // pasta logotipo

// ---------------------------------------------------------




// pasta servidor -------------------------------------

$pasta_servidor = $_SERVER['DOCUMENT_ROOT']."/servidor/"; // pasta servidor

// ---------------------------------------------------------




// pasta de plugins extras -------------------------

$pasta_plugins_extras = $_SERVER['DOCUMENT_ROOT']."/plugins_extras/"; // pasta de plugins extras

// ---------------------------------------------------------




// adiciona logotipo --------------------------------

include($pasta_root_servidor."/logotipo/logotipo.php"); // adiciona logotipo

// --------------------------------------------------------




// dados de conexao ------------------------------

include("banco_dados_e_conexao.php"); // dados de conexao

// --------------------------------------------------------




// bibliotecas necessarias ------------------------

include("dados_busca_inteligente.php"); // dados de motores de busca inteligente

include("dados_tabelas_busca_inteligente.php"); // dados de tabelas de busca inteligente

include("dados_sistema_busca.php"); // dados de sistema de busca

// --------------------------------------------------------




// banco de dados e servidores web --------

# manter esta abaixo das outras includes!

include("servidores_web.php"); // banco de dados e servidores

// ------------------------------------------------------




// email de contato de investimento --------

include("email_contato_investimento.php"); // email de contato de investimento

// ------------------------------------------------------




// pasta de plugins ------------------------------

include("pastas_sistema.php"); // pasta de plugins

// ------------------------------------------------------




// endereco url de arquivos uteis ------------

include("enderecos_url_arquivos_site.php"); // endereco url de arquivos uteis

// ------------------------------------------------------




// arquivos do sistema --------------------------

include("arquivos_sistema.php"); // arquivos do sistema

// ------------------------------------------------------




// enderecos urls de site -----------------------

include("endereco_url_site.php"); // enderecos urls de site

// ------------------------------------------------------




// variaveis de sistema -----------------------------------

include("variaveis_sistema.php"); // variaveis de sistema

// --------------------------------------------------------




// url de servicos externos -------------------------------

include("urls_servicoes_externos.php"); // url de servicos externos

// --------------------------------------------------------










?>
