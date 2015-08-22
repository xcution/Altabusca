<?php


// carrega a lista de hosts a serem removidos -------------

function carrega_hosts_remover(){


// codigo html bruto --------------------------------------

$codigo_html_bruto = monta_lista_hosts_remover(); // codigo html bruto

// --------------------------------------------------------


// adiciona div especial ----------------------------------

$codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); // adiciona div especial

// --------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>