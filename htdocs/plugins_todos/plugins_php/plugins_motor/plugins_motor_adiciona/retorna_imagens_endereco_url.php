<?php


// retorna as imagens do endereco url ------------------------

function retorna_imagens_endereco_url($codigo_html_site, $endereco_url_site){




// separador de informacoes ------------------------------------

global $separador_dados_tabela; // separador de informacoes

global $busca_subimagens_ativada; // informa se a busca por subpaginas esta ativada ou desativada

global $numero_maximo_links_pagina; // numero maximo de links por pagina

// --------------------------------------------------------------------------




// array com dados de retorno ----------------------------------

$array_dados_retorno = array(); // array com dados de retorno

// --------------------------------------------------------------------------




// dom com objetos do codigo html ----------------------------

$dom = new domDocument; // dom com objetos do codigo html

// --------------------------------------------------------------------------




// obtendo codigo html de site ------------------------------------

@$dom->loadHTML($codigo_html_site); // obtendo codigo html de site

// --------------------------------------------------------------------------




// representa documento html por completo ----------------

$dom->preserveWhiteSpace = false; // representa documento html por completo

// --------------------------------------------------------------------------




// obtendo dom por tag --------------------------------------------

$endereco_sites = $dom->getElementsByTagName('img'); // obtendo dom por tag

// --------------------------------------------------------------------------




// obtendo links da pagina ----------------------------------------

foreach ($endereco_sites as $tag){




// obtendo dados de imagem ------------------------------------

$imagem_url = $tag->getAttribute('src'); // url de imagem

$imagem_titulo = $tag->getAttribute('title'); // titulo de imagem

$imagem_alt = $tag->getAttribute('title'); // alt de imagem

// --------------------------------------------------------------------------




// atualiza array de dados de imagem primario ----------

$dados_array_imagem[][0] = $imagem_url.$separador_dados_tabela; // url

$dados_array_imagem[][1] = $imagem_titulo.$separador_dados_tabela; // titulo

$dados_array_imagem[][2] = $imagem_alt.$separador_dados_tabela; // alt

// --------------------------------------------------------------------------




// verifica se array de dados de imagem tem coneudo -

if($imagem_url != null and retorne_elemento_array_existe($array_dados_retorno, $imagem_url) == false){




// atualiza array de retorno final --------------------------------

$array_dados_retorno[] = $dados_array_imagem; // atualizando array com links de pagina

// --------------------------------------------------------------------------




};

// --------------------------------------------------------------------------




// tamanho do array --------------------------------------------------

$tamanho_array = count($array_dados_retorno); // tamanho do array

// --------------------------------------------------------------------------




// verifica se atingiu o tamanho de alocacao maximo ------

if($tamanho_array > $numero_maximo_links_pagina){

break; // saindo de foreach

};

// --------------------------------------------------------------------------




};

// --------------------------------------------------------------------------




// verifica se o modo de subpaginas esta ativado ----------------------

if($busca_subimagens_ativada == true){




// array com links de subpaginas --------------------------------

$links_subpaginas = retorna_links_endereco_url_sem_sublinks($codigo_html_site, $endereco_url_site);

// --------------------------------------------------------------------------




// obtendo enderecos de subpaginas --------------------------

foreach($links_subpaginas as $url_subpagina => $titulo_subpagina){




// dados de subimagens de subpaginas --------------------

$dados_array_subimagem = puxar_subimagens($url_subpagina); // atualiza array de retorno com subimagens

// --------------------------------------------------------------------------




// obtendo dados de subimagens ------------------------------

foreach($dados_array_subimagem as $url_subimagem => $titulo_subimagem){




// atualiza array de dados de imagem primario ----------

$dados_array_imagem[][0] = $url_subimagem.$separador_dados_tabela; // url

$dados_array_imagem[][1] = $titulo_subimagem.$separador_dados_tabela; // titulo

$dados_array_imagem[][2] = $titulo_subimagem.$separador_dados_tabela; // alt

// --------------------------------------------------------------------------




// verifica se array de dados de imagem tem coneudo -

if($url_subimagem != null){




// atualiza array de retorno final --------------------------------

$array_dados_retorno[] = $dados_array_imagem; // atualizando array com links de pagina

// --------------------------------------------------------------------------




};

// --------------------------------------------------------------------------




// tamanho do array --------------------------------------------------

$tamanho_array = count($array_dados_retorno); // tamanho do array

// --------------------------------------------------------------------------




// verifica se atingiu o tamanho de alocacao maximo ------

if($tamanho_array > retorne_tamanho_pode_indexar_site()){

break; // saindo de foreach

};

// --------------------------------------------------------------------------




};

// --------------------------------------------------------------------------




};

// --------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------------------




// retorno ----------------------------------------------------------------

return $array_dados_retorno; // retorno

// --------------------------------------------------------------------------




};

// --------------------------------------------------------------------------




?>