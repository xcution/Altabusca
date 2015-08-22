<?php


// campo reindexar hosts ----------------------------------

function campo_reindexar_hosts(){


// valida servidor atual ----------------------------------

if(retorne_servidor_atual_sessao() == null){

return null; // retorno nulo

};

// --------------------------------------------------------


// numero de hosts a reindexar ----------------------------

$numero_hosts = retorne_numero_reindexar(); // numero de hosts a reindexar

// --------------------------------------------------------


// codigo html bruto --------------------------------------

$codigo_html_bruto .= "<div class='classe_div_campo_reindexar_hosts'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='button' class='btn btn-info' value='Reindexar tudo' onclick='reindexar_hosts_servidor();'>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "Banco de dados: "; // codigo html bruto
$codigo_html_bruto .= mudar_banco_dados(null); // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "Hosts: $numero_hosts"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto

// --------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>