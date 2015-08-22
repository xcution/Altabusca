<?php


// div especial mensagem de sistema sucesso -----------

function div_especial_sucesso($titulo, $mensagem_sistema){


// codigo html bruto ----------------------------------

$codigo_html_bruto .= "<div class='div_especial_mensagem_sistema_sucesso'>"; // codigo html bruto
$codigo_html_bruto .= "<b>$titulo</b>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= $mensagem_sistema; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto

// --------------------------------------------------------


// retorno -----------------------------------------------

return $codigo_html_bruto; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>