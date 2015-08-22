<?php


// puxa os subimagens de imagem informado ----------------------------

function puxar_subimagens($endereco_url_principal){




// globals --------------------------------------------------------------

global $numero_maximo_subimagens_pagina; // numero maximo de subimagens por pagina

// --------------------------------------------------------------------------




// host principal ------------------------------------------------------

$host_site = retorna_host_url($endereco_url_principal); // host do site

// --------------------------------------------------------------------------




// array de retorno com imagens ----------------------------------------

$array_retorno_imagens = array(); // array de retorno com imagens

// ----------------------------------------------------------------------------




// cria sessao http ------------------------------------------------------

$requisicao_http = curl_init(); // cria sessao http

// ----------------------------------------------------------------------------




// define parametros --------------------------------------------------

curl_setopt($requisicao_http, CURLOPT_URL, $endereco_url_principal);// The url to get imagens from

curl_setopt($requisicao_http, CURLOPT_RETURNTRANSFER, true);// We want to get the respone

// ----------------------------------------------------------------------------




// resultados --------------------------------------------------------------

$resultados_requisicao = curl_exec($requisicao_http); // resultados

// ----------------------------------------------------------------------------




// codigo para pegar epanas imagem ----------------------------------

$regex='|<img.*?src="(.*?)"|'; // codigo para pegar epanas imagem

// ----------------------------------------------------------------------------




// pegando imagens --------------------------------------------------------

preg_match_all($regex, $resultados_requisicao, $parts); // pegando imagens

// ----------------------------------------------------------------------------




// imagens encontrados ----------------------------------------------------

$imagens_encontrados = $parts[1]; // imagens encontrados

// ----------------------------------------------------------------------------




// contador ----------------------------------------------------------------

$contador = 0; // contador

// ----------------------------------------------------------------------------




// separando imagens ------------------------------------------------------

foreach($imagens_encontrados as $url_imagem){




// titulo da imagem --------------------------------------------------------

$titulo_imagem = basename($url_imagem); // titulo da imagem

// --------------------------------------------------------------------------------




// atualiza array de retorno ------------------------------------------------

if($url_imagem != null){




// verifica se o imagem esta completo --------------------------------

if(retorna_host_url($url_imagem) == null){

$url_imagem = "http://$host_site".$url_imagem; // completa imagem

};

// ----------------------------------------------------------------------------




// atualiza array de retorno ------------------------------------------

$array_retorno_imagens[$url_imagem] = $titulo_imagem; // url de imagem

// ----------------------------------------------------------------------------




// atualizando contador ----------------------------------------------

$contador++; // atualizando contador

// ----------------------------------------------------------------------------




// verifica se ja atingiu o limite --------------------------------------

if($contador > $numero_maximo_subimagens_pagina){

break; // parando laco

};

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------




// fecha requisicao ------------------------------------------------------

curl_close($requisicao_http); // fechando

// ----------------------------------------------------------------------------




// retorno ------------------------------------------------------------------

return $array_retorno_imagens; // retorno

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------


?>