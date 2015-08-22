<?php


// constroe div especial geral ----------------------

function constroe_div_especial_geral($titulo, $conteudo, $div_id){


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<div class='div_especial_geral_titulo'>"; // codigo html bruto
$codigo_html_bruto .= $titulo; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= ""; // codigo html bruto
$codigo_html_bruto .= "<div class='div_especial_geral_conteudo' id='$div_id'>"; // codigo html bruto
$codigo_html_bruto .= $conteudo; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>