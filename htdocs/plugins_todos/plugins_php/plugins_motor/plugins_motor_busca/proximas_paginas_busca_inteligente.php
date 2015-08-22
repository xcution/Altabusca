<?php


// gera links de proximas paginas em busca inteligente ------------

function proximas_paginas_busca_inteligente($numero_resultados){




// globals ----------------------------------------------------------------------------

global $numero_maximo_resultados_pagina_busca_inteligente; // numero maximo de resultados por paginas

global $numero_proximas_pagina_mudar_index; // numero de paginas proximas paginas que podem ser exibidas

$modo_pesquisa = retorne_modo_pesquisa(); // modo de pesquisa

$pagina_numero = pagina_atual_get(); // pagina atual

$busca_exata = retorne_busca_exata(); // busca exata

// ----------------------------------------------------------------------------------------




// termo de pesquisa --------------------------------------------------

$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa

// ----------------------------------------------------------------------------




// calcula numero de paginas pode formar ------------------------------

$numero_paginas = ($numero_resultados / $numero_maximo_resultados_pagina_busca_inteligente); // calculando

$numero_paginas = round($numero_paginas); // arredonda

// ----------------------------------------------------------------------------------------




// se o numero de paginas for apenas 1 ou menos 0 retorne nulo --

if($numero_paginas <= 1){


return null; // retorno nulo


};

// ----------------------------------------------------------------------------------------




// contador --------------------------------------------------------------------------

$contador[0] = $pagina_numero - 5; // contador

$contador[1] = 1; // subcontador de numero de links por pagina

// ----------------------------------------------------------------------------------------




// links para proximas paginas ------------------------------------------------

for($contador[0] == $contador[0]; $contador[0] <= $numero_paginas; $contador[0]++){




// proxima pagina ------------------------------------------------------------------

$proxima_pagina_numero = $contador[0]; // proxima pagina

// ----------------------------------------------------------------------------------------




// texto de link indicando numero de proxima pagina ------------------

$proxima_pagina_numero_texto = $proxima_pagina_numero + 1; // texto de link

// ----------------------------------------------------------------------------------------




// atualiza subcontador de links ----------------------------------------------

if($proxima_pagina_numero >= 0){

$contador[1]++; // atualiza subcontador de links

};

// ----------------------------------------------------------------------------------------




// verifica se atingiu o limite de links proximas pagina por pesquisa

if($contador[1] > $numero_proximas_pagina_mudar_index){

break; // saindo de for

};

// ----------------------------------------------------------------------------------------




// url de pagina --------------------------------------------------------------------

if($pagina_numero != $proxima_pagina_numero){




// link para proxima pagina ------------------------------------------------------

$url_pagina .= "<a href='index.php?termo_pesquisa=$termo_pesquisa&modo_pesquisa=$modo_pesquisa&pagina_numero=$proxima_pagina_numero&busca_exata=$busca_exata' class='btn btn-primary btn-xs'>"; // url de pagina
$url_pagina .= $proxima_pagina_numero_texto; // url de pagina
$url_pagina .= "</a>"; // url de pagina
$url_pagina .= "&nbsp;"; // url de pagina
$url_pagina .= "&nbsp;"; // url de pagina

// ----------------------------------------------------------------------------------------




}else{




// informa a pagina que esta --------------------------------------------------

$url_pagina .= "<font size='7'><b>"; // url de pagina
$url_pagina .= "<a href='index.php?termo_pesquisa=$termo_pesquisa&modo_pesquisa=$modo_pesquisa&pagina_numero=$proxima_pagina_numero&busca_exata=$busca_exata'>"; // url de pagina
$url_pagina .= $proxima_pagina_numero_texto; // url de pagina
$url_pagina .= "</a>"; // url de pagina
$url_pagina .= "&nbsp;"; // url de pagina
$url_pagina .= "&nbsp;"; // url de pagina
$url_pagina .= "</b></font>"; // url de pagina

// ----------------------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------------------




// se o numero de proxima pagina for negativo url e nula ------------

if($proxima_pagina_numero < 0){

$url_pagina = null; // url de pagina

};

// ----------------------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------------------




// pagina anterior e proxima --------------------------------------------------

$pagina_anterior = $pagina_numero - 1; // pagina anterior

$pagina_posterior = $proxima_pagina_numero + 1; // proxima pagina

// ----------------------------------------------------------------------------------------




// link pagina anterior ------------------------------------------------------------

if($pagina_anterior > -1){

$links[0] = "<a href='index.php?termo_pesquisa=$termo_pesquisa&modo_pesquisa=$modo_pesquisa&pagina_numero=$pagina_anterior&busca_exata=$busca_exata'>Anterior</a>"; // primeiro link

};

// ----------------------------------------------------------------------------------------




// link para proxima pagina ------------------------------------------------------

if($pagina_posterior < $numero_paginas){

$links[1] = "<a href='index.php?termo_pesquisa=$termo_pesquisa&modo_pesquisa=$modo_pesquisa&pagina_numero=$pagina_posterior&busca_exata=$busca_exata'>Mais</a>"; // ultimo link

};

// ----------------------------------------------------------------------------------------




// lista com links de retorno ----------------------------------------------------

$lista_links_retorno .= "<div class='div_lista_links_retorno'>"; // lista com links de retorno
$lista_links_retorno .= $links[0] ; // lista com links de retorno
$lista_links_retorno .= "&nbsp;"; // lista com links de retorno
$lista_links_retorno .= "&nbsp;"; // lista com links de retorno
$lista_links_retorno .= $url_pagina; // lista com links de retorno
$lista_links_retorno .= "&nbsp;"; // lista com links de retorno
$lista_links_retorno .= "&nbsp;"; // lista com links de retorno
$lista_links_retorno .= $links[1]; // lista com links de retorno
$lista_links_retorno .= "</div>"; // lista com links de retorno

// ----------------------------------------------------------------------------------------




// retorno ------------------------------------------------------------------------------

return $lista_links_retorno; // retorno

// ----------------------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------------------


?>