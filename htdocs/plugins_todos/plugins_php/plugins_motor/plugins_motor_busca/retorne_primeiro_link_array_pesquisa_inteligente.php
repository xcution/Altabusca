<?php

// retorna o primeiro link com termo de pesquisa ----------------------

function retorne_primeiro_link_array_pesquisa_inteligente($lista_links, $termo_pesquisa, $host_site){




// globals ----------------------------------------------------------------------------

global $separador_dados_tabela; // separador de dados na tabela

$busca_exata = retorne_busca_exata(); // busca exata

// ----------------------------------------------------------------------------------------




// link de retorno --------------------------------------------------------------------

$link_retorno = null; // link de retorno

// ----------------------------------------------------------------------------------------




// array com termos de pesquisa ------------------------------------

$array_termos_pesquisa = retorne_array_termos_pesquisa($termo_pesquisa); // array com termos de pesquisa

// ------------------------------------------------------------------------------




// cria array de links --------------------------------------------------------------

$array_links = explode($separador_dados_tabela, $lista_links); // cria array de links

// ----------------------------------------------------------------------------------------




// remove duplicatas se houver ------------------------------------------------

$array_links = array_unique($array_links); // remove duplicatas se houver

// ----------------------------------------------------------------------------------------




// verifica se a busca e exata ou parcial ------------------------

if($busca_exata == 1){


$procurar_ocorrencia_termo = true; // busca exata


}else{


$procurar_ocorrencia_termo = false; // busca nao exata


};

// ----------------------------------------------------------------------------




// varrendo links ------------------------------------------------------------------

foreach($array_links as $url_link){




// retorna o host da url ----------------------------------------------------------

$host_url_link = retorna_host_url($url_link); // retorna o host da url

// ----------------------------------------------------------------------------------------




// termo encontrado dentro de array de links ------------------------------

if($host_url_link == $host_site){


$resposta_array_contem_link = retorne_array_site_contem_termo_pesquisa($array_termos_pesquisa, $url_link); // resposta se o array contem o primeiro link

$termo_encontrado_resposta = $resposta_array_contem_link[0]; // termo encontrado dentro de array de links


}else{


$termo_encontrado_resposta = false; // termo nao encontrado


};

// ----------------------------------------------------------------------------------------




// verifica se o link tem o termo de pesquisa ----------------------------

if($termo_encontrado_resposta == $procurar_ocorrencia_termo){




// link de retorno ----------------------------------------------------------------

$link_retorno = $url_link; // link de retorno

// ------------------------------------------------------------------------------------




// parando laco foreach ------------------------------------------------------

break; // parando laco foreach

// ------------------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------------------




// retorno com link ----------------------------------------------------------------

return $link_retorno; // retorno com link

// ----------------------------------------------------------------------------------------




};

// --------------------------------------------------------------------------------------


?>