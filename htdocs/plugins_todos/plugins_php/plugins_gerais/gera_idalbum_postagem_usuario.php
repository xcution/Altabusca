<?php


// gera a id de album de postagem de usuario -

function gera_idalbum_postagem_usuario(){


// data atual -------------------------------------------

$data_atual = data_atual(); // data atual

// --------------------------------------------------------


// string a ser codificada ---------------------------

$string_codificar = $data_atual; // string a ser codificada

// --------------------------------------------------------


// cifrando e obtendo id de album de imagens

$idalbum_imagens = md5($string_codificar);

// --------------------------------------------------------


// retorno ----------------------------------------------

return $idalbum_imagens; // retorno

// -------------------------------------------------------


};

// --------------------------------------------------------


?>