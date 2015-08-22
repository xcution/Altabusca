<?php


// retorna se o array com dados do site contem o termo de pesquisa --------

function retorne_array_site_contem_termo_pesquisa($array_termos_pesquisa, $url_link){




// retorna o host da url ----------------------------------------------------------

$host_url_link = retorna_host_url($url_link); // retorna o host da url

// ----------------------------------------------------------------------------------------




// titulo do link ----------------------------------------------------------------------

$titulo_link = basename($url_link); // titulo do link

// ----------------------------------------------------------------------------------------




// converte titulo para minusculo --------------------------------------------

$titulo_link = strtolower($titulo_link); // converte titulo para minusculo

// --------------------------------------------------------------------------------------




// array de retorno ----------------------------------------------------------------

$array_retorno = array(); // array de retorno

// --------------------------------------------------------------------------------------




// obtendo termos de pesquisa de array ----------------------------------

foreach($array_termos_pesquisa as $termo_pesquisa_array){




// retorna url de imagem -------------------------

if(retorne_modo_pesquisa() == 2){

$url_link = retorna_url_imagem_string($url_link); // url de imagem

};

// --------------------------------------------------------




// valida link ------------------------------------------

if($url_link == null){

return null; // retorno nulo

};

// --------------------------------------------------------




// verifica se a busca e exata -------------------

if(retorne_busca_exata() == 1){




// verifica se termo existe em array ------------

if(strpos($url_link, $termo_pesquisa_array) == true){




// atualizando array --------------------------------

$array_retorno[0] = true; // retorno verdadeiro
$array_retorno[1] = $url_link; // endereco de link

// --------------------------------------------------------





// parando foreach --------------------------------

break; // parando foreach

// --------------------------------------------------------




}else{




// atualizando array --------------------------------

$array_retorno[0] = false; // retorno falso
$array_retorno[1] = $url_link; // sem link

// --------------------------------------------------------




// parando foreach --------------------------------

break; // parando foreach

// --------------------------------------------------------




};

// --------------------------------------------------------




}else{




// verifica se termo existe em array ------------

if(strpos($url_link, $termo_pesquisa_array) == true or strpos($url_link, $termo_pesquisa_array) == false){




// atualizando array --------------------------------

$array_retorno[0] = false; // retorno verdadeiro
$array_retorno[1] = $url_link; // endereco de link

// --------------------------------------------------------





// parando foreach --------------------------------

break; // parando foreach

// --------------------------------------------------------




};

// --------------------------------------------------------




};

// --------------------------------------------------------




};

// --------------------------------------------------------------------------------------




// retorna array --------------------------------------

return $array_retorno; // retorna array 

// --------------------------------------------------------




};

// --------------------------------------------------------------------------------------------------


?>