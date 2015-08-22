<?php


// limit query topicos --------------------------------------

function limit_query_topicos(){


// globals ------------------------------------------------

global $limite_resultados_pagina_topicos; // numero de limite

// --------------------------------------------------------


// pagina atual -------------------------------------------

$pagina_atual = pagina_atual_get(); // pagina atual

// --------------------------------------------------------


// calcula limit ------------------------------------------

$pagina_atual = $pagina_atual * $limite_resultados_pagina_topicos; // calcula limit

// --------------------------------------------------------


// limite -------------------------------------------------

$limite = "order by id desc limit $pagina_atual, $limite_resultados_pagina_topicos"; // limite

// --------------------------------------------------------


// retorno ------------------------------------------------

return $limite; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>