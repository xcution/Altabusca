<?php


// remove comentarios ------------------------------

function remove_comentarios($codigo_entrada){


// removendo comentarios -------------------------

$codigo_entrada = preg_replace('!/\*.*?\*/!s', '', $codigo_entrada); // removendo
$codigo_entrada = preg_replace('#^\s*//.+$#m', "", $codigo_entrada); // removendo
$codigo_entrada = preg_replace('/\n\s*\n/', "\n", $codigo_entrada); // removendo

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_entrada; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>