<?php


// retorna os links do endereco url ----------------------------

function retorna_links_endereco_url($codigo_html_site, $endereco_url_site){




// globals ----------------------------------------------------------------

global $numero_maximo_links_pagina; // numero maximo de links por pagina

// --------------------------------------------------------------------------




// host principal ------------------------------------------------------

$host_site = retorna_host_url($endereco_url_site); // host do site

// --------------------------------------------------------------------------




// array com dados de retorno ----------------------------------

$array_dados_retorno = array(); // array com dados de retorno

$array_dados_buffer = array(); // dados de array de buffer temporario

// --------------------------------------------------------------------------




// dom com objetos do codigo html ----------------------------

$dom = new domDocument; // dom com objetos do codigo html

// --------------------------------------------------------------------------




// obtendo codigo html de site ------------------------------------

@$dom->loadHTML($codigo_html_site); // obtendo codigo html de site

// --------------------------------------------------------------------------




// representa documento html por completo ----------------

$dom->preserveWhiteSpace = false; // representa documento html por completo

// --------------------------------------------------------------------------




// obtendo dom por tag --------------------------------------------

$endereco_sites = $dom->getElementsByTagName('a'); // obtendo dom por tag

// --------------------------------------------------------------------------




// obtendo links da pagina ----------------------------------------

foreach ($endereco_sites as $url_link_principal){




// endereco url --------------------------------------------------------

$endereco_url = $url_link_principal->getAttribute('href'); // endereco url

// --------------------------------------------------------------------------




// endereco url normal, sera usado para verificar se a url nao e null

// ---- usado apenas para comparacao de valor nulo!

$endereco_url_normal = $url_link_principal->getAttribute('href'); // endereco url normal

// --------------------------------------------------------------------------




// verifica se o link esta completo --------------------------------

if(retorna_host_url($endereco_url) == null){




// adiciona protocolo e host de link ------------------------------

$endereco_url = "http://$host_site".$endereco_url; // completa link

// ----------------------------------------------------------------------------




};

// --------------------------------------------------------------------------




// titulo do link ----------------------------------------------------------

$titulo_link = $url_link_principal->childNodes->item(0)->nodeValue; // titulo do link

// --------------------------------------------------------------------------




// endereco host de url de link --------------------------------------

$host_url_link = retorna_host_url($endereco_url); // endereco host de url de link

// --------------------------------------------------------------------------




// puxa links de host diferentes ----------------------------------

puxa_links_host_diferente($endereco_url_site, $endereco_url, $titulo_link); // puxa links de host diferentes

// ------------------------------------------------------------------------




// atualiza array de retorno ----------------------------------------

if(retorne_elemento_array_existe($array_dados_retorno, $endereco_url) == false and $endereco_url_normal != null and $titulo_link != null and $host_site == $host_url_link){




// atualizando array com links de pagina ----------------------

$array_dados_retorno[$endereco_url] = $titulo_link; // atualizando array com links de pagina

// ------------------------------------------------------------------------




};

// --------------------------------------------------------------------------




// tamanho do array --------------------------------------------------

$tamanho_array = count($array_dados_retorno); // tamanho do array

// --------------------------------------------------------------------------




// verifica se atingiu o tamanho de alocacao maximo ------

if($tamanho_array > $numero_maximo_links_pagina){

break; // saindo de foreach

};

// --------------------------------------------------------------------------




};

// --------------------------------------------------------------------------




// aloca resultados no buffer --------------------------------------

$array_dados_buffer = $array_dados_retorno; // aloca resultados no buffer

// --------------------------------------------------------------------------




// varrendo array de buffer ------------------------------------------

foreach($array_dados_buffer as $endereco_url_buffer => $titulo_buffer){




// urls de url principal ------------------------------------------------

$sublinks_array = puxar_sublinks($endereco_url_buffer); // urls de url principal

// --------------------------------------------------------------------------




// obtendo sublinks e atualizando array de retorno --------

foreach($sublinks_array as $url_sublink){




// titulo de sublink ----------------------------------------------------

$titulo_sublink = basename($url_sublink); // titulo de sublink

// ------------------------------------------------------------------------




// endereco host de url de link --------------------------------------

$host_url_link = retorna_host_url($url_sublink); // endereco host de url de link

// --------------------------------------------------------------------------




// puxa links de host diferentes ----------------------------------

puxa_links_host_diferente($endereco_url_site, $url_sublink, $titulo_sublink); // puxa links de host diferentes

// ------------------------------------------------------------------------




// atualiza array de retorno ----------------------------------------

if(retorne_elemento_array_existe($array_dados_retorno, $url_sublink) == false and $url_sublink != null and $host_site == $host_url_link){




// atualizando array com links de pagina ------------------------

$array_dados_retorno[$url_sublink] = $titulo_sublink; // atualizando array com links de pagina

// ------------------------------------------------------------------------




};

// --------------------------------------------------------------------------




};

// --------------------------------------------------------------------------




// tamanho do array --------------------------------------------------

$tamanho_array = count($array_dados_retorno); // tamanho do array

// --------------------------------------------------------------------------




// verifica se atingiu o tamanho de alocacao maximo ------

if($tamanho_array > retorne_tamanho_pode_indexar_site()){

break; // saindo de foreach

};

// --------------------------------------------------------------------------




};

// --------------------------------------------------------------------------




// retorno ----------------------------------------------------------------

return $array_dados_retorno; // retorno

// --------------------------------------------------------------------------




};

// --------------------------------------------------------------------------




?>