<?php


// monta a lista de hosts a serem removidos ---------------

function monta_lista_hosts_remover(){


// tabela de banco de dados -------------------------------

global $tabela_dados; // tabela de banco de dados

// --------------------------------------------------------


// limit de query -----------------------------------------

$limit_query = limit_query_geral_sem_id(); // limit de query

// --------------------------------------------------------


// termo de pesquisa --------------------------------------

$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa

// --------------------------------------------------------


// query --------------------------------------------------

$query[0] = "select *from $tabela_dados[0] where host_site like '%$termo_pesquisa%' $limit_query;"; // query

$query[1] = "select *from $tabela_dados[0] where host_site like '%$termo_pesquisa%';"; // query

// --------------------------------------------------------


// comando ------------------------------------------------

$comando = comando_executa($query[0]); // comando

// --------------------------------------------------------


// numero de linhas ---------------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// --------------------------------------------------------


// contador -----------------------------------------------

$contador = 0; // contador

// --------------------------------------------------------


// varrendo dados -----------------------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados --------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// --------------------------------------------------------


// separando valores --------------------------------------

$host_site = $dados['host_site']; // host de site

// --------------------------------------------------------


// valida host de site ------------------------------------

if($host_site != null){


// campo de host ------------------------------------------

$campo_host .= "Host:"; // campo de host
$campo_host .= "&nbsp;"; // campo de host
$campo_host .= "<a href='http://$host_site' target='_blank'>$host_site</a>"; // campo de host
$campo_host .= "<br>"; // campo de host
$campo_host .= "<input type='button' value='Excluir' onclick='exclui_host_site($contador);' class='btn btn-danger btn-xs'>"; // campo de host
$campo_host .= "<input type='hidden' id='host_site_excluir_$contador' value='$host_site'>"; // campo de host
$campo_host .= "<br>"; // campo de host


// --------------------------------------------------------


// adiciona div especial ----------------------------------

$campo_host = div_especial_basica_campos($campo_host); // adiciona div especial

// --------------------------------------------------------


// atualiza lista de hosts --------------------------------

$lista_hosts .= $campo_host; // atualiza lista de hosts

// --------------------------------------------------------


// limpa campo de host ------------------------------------

$campo_host = null; // limpa campo de host

// --------------------------------------------------------


};

// --------------------------------------------------------


};

// --------------------------------------------------------


// numero de linhas query ---------------------------------

$numero_resultados = retorne_numero_linhas_query($query[1]);

// --------------------------------------------------------


// formulario de pesquisa ---------------------------------

$formulario_pesquisa .= "Pesquise por um host a ser removido."; // formulario de pesquisa
$formulario_pesquisa .= "<br>"; // formulario de pesquisa
$formulario_pesquisa .= "<form action='index.php' method='get'>"; // formulario de pesquisa
$formulario_pesquisa .= "<input type='text' name='termo_pesquisa' value='$termo_pesquisa'>"; // formulario de pesquisa
$formulario_pesquisa .= "<br>"; // formulario de pesquisa
$formulario_pesquisa .= "<input type='submit' value='Pesquisar' class='btn btn-primary'>"; // formulario de pesquisa
$formulario_pesquisa .= "&nbsp;"; // formulario de pesquisa
$formulario_pesquisa .= "<a href='index.php' class='btn btn-success'>Nova pesquisa</a>"; // formulario de pesquisa
$formulario_pesquisa .= "</form>"; // formulario de pesquisa

// --------------------------------------------------------


// adiciona div especial ----------------------------------

$formulario_pesquisa = div_especial_basica_campos($formulario_pesquisa); // adiciona div especial

// --------------------------------------------------------


// codigo html bruto --------------------------------------

$codigo_html_bruto .= $formulario_pesquisa; // codigo html bruto
$codigo_html_bruto .= campo_select_altera_banco_dados(); // codigo html bruto
$codigo_html_bruto .= $lista_hosts; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= proximas_paginas_busca_inteligente($numero_resultados); // codigo html bruto

// --------------------------------------------------------


// titulo -------------------------------------------------

$titulo = "Hosts a serem removidos"; // titulo

// --------------------------------------------------------


// adiciona div especial ----------------------------------

$codigo_html_bruto = constroe_div_especial_geral($titulo, $codigo_html_bruto, null); // adiciona div especial

// --------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>