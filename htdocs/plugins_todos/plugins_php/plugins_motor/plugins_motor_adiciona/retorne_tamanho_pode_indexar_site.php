<?php


// retorna o tamanho de indexacao por site -

function retorne_tamanho_pode_indexar_site(){


// globals -----------------------------------------------

global $numero_maximo_links_pagina; // numero maximo de links por pagina inicial

global $numero_maximo_sublinks_pagina; // numero maximo de sublinks por pagina

global $numero_maximo_subimagens_pagina; // numero maximo de subimagens por pagina

// --------------------------------------------------------


// calculando tamanhos individuais -----------

$tamanho[0] = $numero_maximo_links_pagina * $numero_maximo_sublinks_pagina; // links

$tamanho[1] = $numero_maximo_links_pagina * $numero_maximo_subimagens_pagina; // imagens

// --------------------------------------------------------


// tamanho total ------------------------------------

$tamanho_total = $tamanho[0] + $tamanho[1]; // tamanho total

// --------------------------------------------------------


// retorno ---------------------------------------------

return $tamanho_total; // retorno
 
// --------------------------------------------------------


};

// --------------------------------------------------------


?>