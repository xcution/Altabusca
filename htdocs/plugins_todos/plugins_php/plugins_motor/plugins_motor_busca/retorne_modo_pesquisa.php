<?php


// retorna o modo de pesquisa ----------------

function retorne_modo_pesquisa(){


// modo de pesquisa -----------------------------

$modo_pesquisa = remove_html($_GET['modo_pesquisa']); // modo de pesquisa

// -------------------------------------------------------


// valida modo de pesquisa --------------------

if($modo_pesquisa == null or is_numeric($modo_pesquisa) == false){

$modo_pesquisa = 1; // padrao busca por links

};

// --------------------------------------------------------


// retorna o modo de pesquisa -----------------

return $modo_pesquisa; // retorna o modo de pesquisa

// --------------------------------------------------------


};

// --------------------------------------------------------


?>