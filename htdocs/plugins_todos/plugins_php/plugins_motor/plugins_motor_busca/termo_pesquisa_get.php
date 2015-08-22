<?php


// termo de pesquisa modo get ----------------

function termo_pesquisa_get(){


// termo de pesquisa ------------------------------

$termo_pesquisa = $_GET['termo_pesquisa']; // termo de pesquisa

// --------------------------------------------------------


// remove html --------------------------------------

$termo_pesquisa = remove_html($termo_pesquisa); // remove html

// --------------------------------------------------------


// converte para minusculo ---------------------

$termo_pesquisa = strtolower($termo_pesquisa); // converte para minusculo

// --------------------------------------------------------


// retorno ---------------------------------------------

return $termo_pesquisa; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>