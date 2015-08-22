<?php


// gerencia publicacoes -----------------------------------

function gerencia_publicacoes(){
	
	
// codigo html bruto --------------------------------------

$codigo_html_bruto .= carrega_publicacoes_ajuda_editar(); // codigo html bruto
$codigo_html_bruto .= ""; // codigo html bruto
$codigo_html_bruto .= ""; // codigo html bruto

// --------------------------------------------------------


// titulo -------------------------------------------------

$titulo = "Publicações de ajuda"; // titulo

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