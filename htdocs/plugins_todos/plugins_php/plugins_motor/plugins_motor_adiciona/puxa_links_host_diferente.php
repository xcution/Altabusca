<?php


// puxa links de host diferentes ao host atual --------------------

function puxa_links_host_diferente($site_url, $link_site, $titulo_link_site){




// array com links de hosts diferentes ------------------------------

global $array_links_host_diferente; // array com links de hosts diferentes

// ----------------------------------------------------------------------------




// obtendo host de endereco de site e link ------------------------

$host[0] = retorna_host_url($site_url); // host de site

$host[1] = retorna_host_url($link_site); // host de link

// ----------------------------------------------------------------------------




// endereco de host diferente ----------------------------------------

$host_diferente = $host[1]; // endereco de host diferente

// ----------------------------------------------------------------------------




// verifica se hosts sao iguais ----------------------------------------

if($host[0] != $host[1]){




// atualiza array ----------------------------------------------------------

if(retorne_elemento_array_existe($array_links_host_diferente, $host_diferente) == false){




// atualiza array ----------------------------------------------------------

$array_links_host_diferente[$host_diferente] = $titulo_link_site; // atualiza array

// ----------------------------------------------------------------------------




// cadastra proximos hosts a serem indexados no futuro ---

cadastra_novo_host_indexar($host_diferente); // cadastrando hosts

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------


?>