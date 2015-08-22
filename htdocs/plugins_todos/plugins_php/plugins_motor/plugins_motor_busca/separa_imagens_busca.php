<?php


// separa as imagens na busca ----------------------------------

function separa_imagens_busca($imagens_site_geral, $host_site){




// global ------------------------------------------------------------------

global $separador_dados_tabela; // separador de dados em tabela

global $numero_maximo_imagens_host_busca_inteligente; // numero maximo de imagens a exibir por host de pesquisa no modo imagens

$busca_exata = retorne_busca_exata(); // busca exata

// ----------------------------------------------------------------------------


// termo de pesquisa --------------------------------------------------

$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa

// ----------------------------------------------------------------------------




// array com termos de pesquisa ------------------------------------

$array_termos_pesquisa = retorne_array_termos_pesquisa($termo_pesquisa); // array com termos de pesquisa

// ------------------------------------------------------------------------------




// array de dados de imagens ------------------------------------

$array_imagens = explode($separador_dados_tabela, $imagens_site_geral); // array de dados de imagens

// ----------------------------------------------------------------------------




// remove duplicatas se houver ------------------------------------

$array_imagens = array_unique($array_imagens); // removendo duplicatas

// ----------------------------------------------------------------------------




// contador de resultados encontrados ------------------------

$contador = 0; // contador de resultados encontrados

// ----------------------------------------------------------------------------




// verifica se a busca e exata ou parcial ------------------------

if($busca_exata == 1){


$procurar_ocorrencia_termo = true; // busca exata


}else{


$procurar_ocorrencia_termo = false; // busca nao exata


};

// ----------------------------------------------------------------------------




// obtendo imagens --------------------------------------------------

foreach($array_imagens as $url_imagem){




// host da imagem ----------------------------------------------------

$host_imagem = retorna_host_url($url_imagem); // host de imagem

// ----------------------------------------------------------------------------




// completa url de imagem em caso de host nulo ----------

if($host_imagem == null){

$url_imagem = "http://".$host_site."/".$url_imagem; // completa url de imagem em caso de host nulo

};

// ----------------------------------------------------------------------------




// titulo da imagem ----------------------------------------------------

$titulo_imagem = basename($url_imagem); // titulo da imagem

// ----------------------------------------------------------------------------




// imagem encontrada ----------------------------------------------

if($host_imagem != null){

$imagem_encontrada .= "<a href='$url_imagem' target='_blank'>"; // imagem encontrada
$imagem_encontrada .= "<img class='imagem_resposta_busca_inteligente' src='$url_imagem' alt='$titulo_imagem' title='$titulo_imagem'>"; // imagem encontrada
$imagem_encontrada .= "</a>"; // imagem encontrada

};

// ----------------------------------------------------------------------------




// converte titulo de imagem para minusculo ------------------

$titulo_imagem = strtolower($titulo_imagem); // converte titulo de imagem para minusculo

// ----------------------------------------------------------------------------




// termo encontrado dentro de array de links ------------------

$termo_encontrado_resposta = retorne_array_site_contem_termo_pesquisa($array_termos_pesquisa, $url_imagem); // termo encontrado dentro de array de links

$termo_encontrado_resposta = $termo_encontrado_resposta[0]; // verifica se encontrou o link da imagem

// ----------------------------------------------------------------------------




// verifica se a imagem tem o termo de pesquisa ----------

if($termo_encontrado_resposta == $procurar_ocorrencia_termo){




// imagem completa ------------------------------------------------

$imagem_completa .= $imagem_encontrada; // imagem completa

// --------------------------------------------------------------------------




// atualiza o contador ------------------------------------------------

$contador++; // atualiza o contador

// ----------------------------------------------------------------------------




// verifica limite de numero de imagens ----------------------

if($contador >= $numero_maximo_imagens_host_busca_inteligente){

return $imagem_completa; // retorno

};

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------




// limpando dados ----------------------------------------------------

$imagem_encontrada = null; // limpando

// --------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------




// retorno ------------------------------------------------------------------

return $imagem_completa; // retorno

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------


?>