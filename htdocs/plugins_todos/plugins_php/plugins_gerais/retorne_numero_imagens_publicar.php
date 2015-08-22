<?php


// retorne o numero de imagens a publicar ----

function retorne_numero_imagens_publicar(){


// contador --------------------------------------------

$contador = 0; // contador

// --------------------------------------------------------


// contando itens ------------------------------------

foreach($_FILES['foto']['name'] as $nome_imagem){


// valida nome de item -----------------------------

if($nome_imagem != null){

$contador++; // atualiza contador

};

// --------------------------------------------------------


};

// --------------------------------------------------------


// retorno ----------------------------------------------

return $contador; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>