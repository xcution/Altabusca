<?php


// retorna o host da url ----------------------------------------------

function retorna_host_url($endereco_url_site){




// dados do host ------------------------------------------------------

$dados_host = parse_url($endereco_url_site); // dados do host

// --------------------------------------------------------------------------




// constroe host ------------------------------------------------------

$host_site =  $dados_host['host']; // obtendo o host

$host_site = str_replace("www.", null, $host_site); // remove www.

$host_site = addslashes($host_site); // remove acentos se houver

// --------------------------------------------------------------------------




// retorna o  host do site --------------------------------------------

return $host_site; // retorna o  host do site

// --------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------


?>