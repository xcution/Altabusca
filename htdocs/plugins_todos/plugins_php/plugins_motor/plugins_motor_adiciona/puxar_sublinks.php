<?php


// puxa os sublinks de link informado ----------------------------

function puxar_sublinks($endereco_url_principal){




// globals --------------------------------------------------------------

global $numero_maximo_sublinks_pagina; // numero maximo de sublinks por pagina

global $busca_sublinks_ativada; // informa se a busca por subpaginas esta ativada ou desativada

// --------------------------------------------------------------------------




// array de retorno com links ----------------------------------------

$array_retorno_links = array(); // array de retorno com links

// ----------------------------------------------------------------------------




// verifica se o modo de subpaginas esta ativado ----------

if($busca_sublinks_ativada == false){

return $array_retorno_links; // retorno nulo

};

// --------------------------------------------------------------------------




// host principal ------------------------------------------------------

$host_site = retorna_host_url($endereco_url_principal); // host do site

// --------------------------------------------------------------------------




// cria sessao http ------------------------------------------------------

$requisicao_http = curl_init(); // cria sessao http

// ----------------------------------------------------------------------------




// define parametros --------------------------------------------------

curl_setopt($requisicao_http, CURLOPT_URL, $endereco_url_principal);// The url to get links from

curl_setopt($requisicao_http, CURLOPT_RETURNTRANSFER, true);// We want to get the respone

// ----------------------------------------------------------------------------




// resultados --------------------------------------------------------------

$resultados_requisicao = curl_exec($requisicao_http); // resultados

// ----------------------------------------------------------------------------




// codigo para pegar epanas link ----------------------------------

$regex='|<a.*?href="(.*?)"|'; // codigo para pegar epanas link

// ----------------------------------------------------------------------------




// pegando links --------------------------------------------------------

preg_match_all($regex, $resultados_requisicao, $parts); // pegando links

// ----------------------------------------------------------------------------




// links encontrados ----------------------------------------------------

$links_encontrados = $parts[1]; // links encontrados

// ----------------------------------------------------------------------------




// contador ----------------------------------------------------------------

$contador = 0; // contador

// ----------------------------------------------------------------------------




// separando links ------------------------------------------------------

foreach($links_encontrados as $url_link){




// atualiza array de retorno ------------------------------------------

if($url_link != null){




// verifica se o link esta completo --------------------------------

if(retorna_host_url($url_link) == null){

$url_link = "http://$host_site".$url_link; // completa link

};

// ----------------------------------------------------------------------------




// atualiza array de retorno ------------------------------------------

$array_retorno_links[] = $url_link; // atualiza array de retorno

// ----------------------------------------------------------------------------




// atualizando contador ----------------------------------------------

$contador++; // atualizando contador

// ----------------------------------------------------------------------------




// verifica se ja atingiu o limite --------------------------------------

if($contador > $numero_maximo_sublinks_pagina){

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

return $array_retorno_links; // retorno

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------


?>