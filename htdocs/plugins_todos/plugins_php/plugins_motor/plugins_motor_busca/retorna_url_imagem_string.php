<?php


// retorna a url da imagem da string ----------

function retorna_url_imagem_string($url_link){


// seta condicoes e pega urls de imagens --

$pattern = '/[\w\-]+\.(jpg|png|gif|jpeg)/'; // condicao

$result = preg_match($pattern, $url_link, $matches); // pegando enderecos de imagens

// ---------------------------------------------------------


// se encontrar imagem seta a url -------------

if($matches[0] != null){


$matches[0] = $url_link; // setando url...


};

// ---------------------------------------------------------


// retorno -----------------------------------------------

return $matches[0]; // retorno

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>