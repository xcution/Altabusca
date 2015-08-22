<?php


// retorna os links do endereco url ----------------------------

function retorna_links_endereco_url_sem_sublinks($codigo_html_site, $endereco_url_site){




// host principal ------------------------------------------------------

$host_site = retorna_host_url($endereco_url_site); // host do site

// --------------------------------------------------------------------------




// array com dados de retorno ----------------------------------

$array_dados_retorno = array(); // array com dados de retorno

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




// verifica se o link esta completo --------------------------------

if(retorna_host_url($endereco_url) == null){

$endereco_url = "http://$host_site".$endereco_url; // completa link

};

// --------------------------------------------------------------------------




// titulo do link ----------------------------------------------------------

$titulo_link = $url_link_principal->childNodes->item(0)->nodeValue; // titulo do link

// --------------------------------------------------------------------------




// atualiza array de retorno ----------------------------------------

if(retorne_elemento_array_existe($array_dados_retorno, $endereco_url) == false){

$array_dados_retorno[$endereco_url] = $titulo_link; // atualizando array com links de pagina

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