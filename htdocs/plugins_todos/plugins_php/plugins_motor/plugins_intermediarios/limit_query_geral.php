<?php


// limit query geral --------------------------------------

function limit_query_geral(){


// globals ------------------------------------------------

global $numero_maximo_resultados_pagina_busca_inteligente; // numero de limite

// --------------------------------------------------------


// pagina atual -------------------------------------------

$pagina_atual = pagina_atual_get(); // pagina atual

// --------------------------------------------------------


// calcula limit ------------------------------------------

$pagina_atual *= $numero_maximo_resultados_pagina_busca_inteligente; // calcula limit

// --------------------------------------------------------


// limite -------------------------------------------------

$limite = "order by id desc limit $pagina_atual, $numero_maximo_resultados_pagina_busca_inteligente"; // limite

// --------------------------------------------------------


// retorno ------------------------------------------------

return $limite; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>