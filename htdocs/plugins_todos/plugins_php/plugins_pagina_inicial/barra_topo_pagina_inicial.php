<?php


// barra do topo da pagina inicial -------------

function barra_topo_pagina_inicial(){


// globals ------------------------------------------------

global $url_do_servidor; // url de servidor

global $url_servico_externo; // urls de servicos

global $endereco_url_site_global; // endereco de urls de site interno

// --------------------------------------------------------


// links --------------------------------------------------

$links[0] = "<a href='$url_servico_externo[0]' title='' class='classe_links_topo'>Dinngle</a>"; // link
$links[1] = "<a href='$endereco_url_site_global[6]' title='Navegador Internet Globe' class='classe_links_topo'>Internet Globe</a>"; // link
$links[2] = "<a href='$url_do_servidor?modo_pesquisa=2' title='' class='classe_links_topo'>Imagens</a>"; // link
$links[3] = "<a href='' title='' class='classe_links_topo'></a>"; // link
$links[4] = "<a href='' title='' class='classe_links_topo'></a>"; // link

// --------------------------------------------------------


// barra do topo ------------------------------------

$barra_topo .= "<div id='div_barra_topo_pagina_inicial'>"; // barra do topo
$barra_topo .= $links[0]; // barra do topo
$barra_topo .= $links[1]; // barra do topo
$barra_topo .= $links[2]; // barra do topo
$barra_topo .= $links[3]; // barra do topo
$barra_topo .= $links[4]; // barra do topo
$barra_topo .= "</div>"; // barra do topo

// -------------------------------------------------------


// retorno --------------------------------------------

return $barra_topo; // retorno

// ------------------------------------------------------


};

// ------------------------------------------------------


?>