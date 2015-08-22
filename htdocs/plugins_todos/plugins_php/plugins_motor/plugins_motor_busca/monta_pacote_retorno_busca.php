<?php


// monta o pacote de retorno de busca ------------------------

function monta_pacote_retorno_busca($comando){




// globals ----------------------------------------------------------------

$modo_pesquisa = retorne_modo_pesquisa(); // modo de pesquisa

global $tamanho_maximo_descricao_exibir_site_pesquisa; // tamanho de caracteres de descricao

global $tamanho_limite_busca_inteligente_query; // este e o tamanho limite na busca query, isto evita uma busca desnecessaria em todo o banco de dados

global $tamanho_maximo_titulo_resultado_pesquisa; // tamanho maximo de titulo de pesquisa

// ----------------------------------------------------------------------------




// termo de pesquisa --------------------------------------------------

$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa

// ----------------------------------------------------------------------------




// numero de linhas ----------------------------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// ----------------------------------------------------------------------------




// contador --------------------------------------------------------------

$contador = 0; // contador

// ----------------------------------------------------------------------------




// dados de array de retorno --------------------------------------

$dados_array_retorno = array(); // dados de array de retorno

// ----------------------------------------------------------------------------




// varrendo dados ----------------------------------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){




// dados ------------------------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// ----------------------------------------------------------------------------




// separando dados --------------------------------------------------

$host_site = $dados['host_site']; // dados de tabela

$url_pagina = $dados['url_pagina']; // dados de tabela

$titulo_site = codificacao_unicode($dados['titulo_site']); // dados de tabela

$description_site = codificacao_unicode($dados['description_site']); // dados de tabela

$links_internos_site = $dados['links_internos_site']; // dados de tabela

$imagens_site_geral = $dados['imagens_site_geral']; // dados de tabela

$conteudo_site = codificacao_unicode($dados['conteudo_site']); // conteudo do site

// --------------------------------------------------------------------------




// limita tamanho de titulo -------------------------------------------

if(strlen($titulo_site) > $tamanho_maximo_titulo_resultado_pesquisa){

$titulo_site = substr($titulo_site, 0, $tamanho_maximo_titulo_resultado_pesquisa)."..."; // limita tamanho de titulo

};

// ----------------------------------------------------------------------------




// primeiro link com termo de busca ----------------------------

$link_termo_busca = retorne_primeiro_link_array_pesquisa_inteligente($links_internos_site, $termo_pesquisa, $host_site); // primeiro link com termo de busca

// ---------------------------------------------------------------------------




// link encontrado resposta ----------------------------------------

if($link_termo_busca != null){


$link_encontrado_resposta = true; // link encontrado


}else{


$link_encontrado_resposta = false; // link nao encontrado


};

// ----------------------------------------------------------------------------




// adiciona link a titulo ----------------------------------------------

if($link_encontrado_resposta == true){


$titulo_site = "<a href='$link_termo_busca' title='$titulo_site' target='_blank' class='classe_link_titulo_pesquisa'>$titulo_site</a>"; // adiciona link a titulo


}else{


$titulo_site = "<a href='$url_pagina' title='$titulo_site' target='_blank' class='classe_link_titulo_pesquisa'>$titulo_site</a>"; // adiciona link a titulo


};

// ----------------------------------------------------------------------------




// limita tamanho de descricao ----------------------------------

if(strlen($description_site) > $tamanho_maximo_descricao_exibir_site_pesquisa){

$description_site = substr($description_site, 0, $tamanho_maximo_descricao_exibir_site_pesquisa)."...";

};

// ----------------------------------------------------------------------------




// separando imagens_busca ------------------------------------

if($modo_pesquisa == 2){

$imagens_busca = separa_imagens_busca($imagens_site_geral, $host_site); // separando imagens_busca

};

// ----------------------------------------------------------------------------




// conteudo do host --------------------------------------------------

if($host_site != null){




// modo de pesquisa ------------------------------------------------

if($modo_pesquisa != 2){




// conteudo com link ------------------------------------------------

$conteudo_host .= "<div class='div_resultado_busca_inteligente_web'>"; // conteudo do host
$conteudo_host .= $titulo_site; // conteudo do host
$conteudo_host .= "<br>"; // conteudo do host
$conteudo_host .= "<b>"; // conteudo do host
$conteudo_host .= $host_site; // conteudo do host
$conteudo_host .= "</b>"; // conteudo do host
$conteudo_host .= "<br>"; // conteudo do host
$conteudo_host .= $description_site; // conteudo do host
$conteudo_host .= "</div>"; // conteudo do host
$conteudo_host .= "<br>"; // conteudo do host

// ----------------------------------------------------------------------------




}else{




// conteudo com imagem ------------------------------------------------

if(count($imagens_busca) > 0){

$conteudo_host .= "<div class='div_resultado_busca_inteligente_imagens'>"; // conteudo do host
$conteudo_host .= $titulo_site; // conteudo do host
$conteudo_host .= "<br>"; // conteudo do host
$conteudo_host .= "<b>"; // conteudo do host
$conteudo_host .= $host_site; // conteudo do host
$conteudo_host .= "</b>"; // conteudo do host
$conteudo_host .= "<br>"; // conteudo do host
$conteudo_host .= $description_site; // conteudo do host
$conteudo_host .= "<br>"; // conteudo do host
$conteudo_host .= "<br>"; // conteudo do host
$conteudo_host .= $imagens_busca; // conteudo do host
$conteudo_host .= "</div>"; // conteudo do host

};

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------




// modo de pesquisa de imagens ou web --------------------

if($modo_pesquisa == 2){




// modo imagens atualiza array ----------------------------------

$dados_array_retorno[$contador] = $conteudo_host; // atualizando tabela

// ----------------------------------------------------------------------------




}else{




// modo web atualiza array ----------------------------------------

if($link_encontrado_resposta == true){

$dados_array_retorno[$contador] = $conteudo_host; // atualizando tabela

};

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------




// limpando dados antigos ------------------------------------------

$conteudo_host = null; // limpando dados antigos

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------




// inverte a ordem de resultados ----------------------------------

if(count($dados_array_retorno) > 0){


$dados_array_retorno = array_reverse($dados_array_retorno); // inverte a ordem de resultados


};

// ----------------------------------------------------------------------------




// retorno de dados --------------------------------------------------

return $dados_array_retorno; // retorno de dados

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------


?>