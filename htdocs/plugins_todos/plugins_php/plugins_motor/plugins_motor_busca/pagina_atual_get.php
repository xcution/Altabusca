<?php


// numero de pagina modo get ----------------

function pagina_atual_get(){


// numero de pagina ------------------------------

$pagina_numero = $_GET['pagina_numero']; // numero de pagina

// --------------------------------------------------------


// remove html --------------------------------------

$pagina_numero = remove_html($pagina_numero); // remove html

// --------------------------------------------------------


// valida se e numero -----------------------------

if(is_numeric($pagina_numero) == false){

$pagina_numero = 0; // pagina zero

};

// --------------------------------------------------------


// retorno ---------------------------------------------

return $pagina_numero; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>