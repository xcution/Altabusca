<?php


// monta pagina inicial ------------------------------------------------------

function monta_pagina_inicial(){




// globals ------------------------------------------------------------------------

$modo_pesquisa = retorne_modo_pesquisa(); // modo de pesquisa

$pagina_numero = pagina_atual_get(); // pagina atual

$busca_exata = retorne_busca_exata(); // busca exata

global $nome_do_sistema; // nome do sistema

global $url_do_servidor; // url de servidor

global $resultados_busca_termos; // resultados de pesquisa

global $opcoes_busca_site; // opcoes de busca

global $descricao_basica_site_meta_tag; // descricao do site

global $nome_desenvolvedor_projeto; // nome do desenvolvedor

global $tags_site; // tags do site

global $endereco_url_arquivos; // endereco url de arquivos

// ------------------------------------------------------------------------------------




// termo de pesquisa -------------------------------------------------

$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa

// ----------------------------------------------------------------------------




// titulo da pagina ------------------------------------------------------------

$titulo_pagina = $nome_do_sistema; // titulo da pagina

// ------------------------------------------------------------------------------------




// url de pesquisa completa ----------------------------------------------

$url_pesquisa_completa[1] = "index.php?termo_pesquisa=$termo_pesquisa&modo_pesquisa=1&busca_exata=$busca_exata"; // url de pesquisa completa
$url_pesquisa_completa[2] = "index.php?termo_pesquisa=$termo_pesquisa&modo_pesquisa=2&busca_exata=$busca_exata"; // url de pesquisa completa

// ------------------------------------------------------------------------------------




// pesquisa atual --------------------------------------------------------------

if($termo_pesquisa != null){

$pesquisa_atual .= "<div class='div_modos_pesquisa'>"; // pesquisa atual
$pesquisa_atual .= "<a href='$url_pesquisa_completa[1]' class='classe_links_opcoes_busca' title='Web'>$opcoes_busca_site[1]</a>"; // pesquisa atual
$pesquisa_atual .= "<a href='$url_pesquisa_completa[2]' class='classe_links_opcoes_busca' title='Imagens'>$opcoes_busca_site[2]</a>"; // pesquisa atual
$pesquisa_atual .= "</div>"; // pesquisa atual
$pesquisa_atual .= "<br>"; // pesquisa atual
$pesquisa_atual .= "<div class='div_termo_pesquisa_atual'>"; // pesquisa atual
$pesquisa_atual .= "Pesquisando por "; // pesquisa atual
$pesquisa_atual .= "<a href='$url_pesquisa_completa[1]' title='$termo_pesquisa'>"; // pesquisa atual
$pesquisa_atual .= "<b>"; // pesquisa atual
$pesquisa_atual .= $termo_pesquisa; // pesquisa atual
$pesquisa_atual .= "</b>"; // pesquisa atual
$pesquisa_atual .= "</a>"; // pesquisa atual
$pesquisa_atual .= "</div>"; // pesquisa atual
$pesquisa_atual .= $resultados_busca_termos; // pesquisa atual

};

// ------------------------------------------------------------------------------------




// codigo html da pagina inicial ------------------------------------------

$codigo_html_pagina .= "<html>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<head>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<meta charset='UTF-8'>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<meta name='description' content='$descricao_basica_site_meta_tag'>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<meta name='author' content='$nome_desenvolvedor_projeto'>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<meta name='keywords' content='$tags_site'>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<link rel='stylesheet' type='text/css' href='$endereco_url_arquivos[3]'>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<link rel='stylesheet' type='text/css' href='$endereco_url_arquivos[1]'>"; // codigo html da pagina inicial
$codigo_html_pagina .= ""; // codigo html da pagina inicial
$codigo_html_pagina .= ""; // codigo html da pagina inicial
$codigo_html_pagina .= "<meta name='viewport' content='width=device-width'/>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<title>"; // codigo html da pagina inicial
$codigo_html_pagina .= $titulo_pagina; // codigo html da pagina inicial
$codigo_html_pagina .= "</title>"; // codigo html da pagina inicial
$codigo_html_pagina .= "</head>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<body>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<div class='div_corpo_pagina'>"; // codigo html da pagina
$codigo_html_pagina .= barra_topo_pagina_inicial(); // codigo html da pagina inicial
$codigo_html_pagina .= "<div id='div_painel_principal_pagina_inicial'>"; // codigo html da pagina inicial
$codigo_html_pagina .= barra_pesquisa_pagina_inicial(); // codigo html da pagina inicial
$codigo_html_pagina .= $pesquisa_atual; // codigo html da pagina inicial
$codigo_html_pagina .= "</div>"; // codigo html da pagina inicial
$codigo_html_pagina .= barra_rodape_pagina_inicial(); // codigo html da pagina inicial
$codigo_html_pagina .= "</div>"; // codigo html da pagina
$codigo_html_pagina .= "</body>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<script type='text/javascript' src='$endereco_url_arquivos[0]'></script>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<script type='text/javascript' src='$endereco_url_arquivos[2]'></script>"; // codigo html da pagina inicial
$codigo_html_pagina .= "</html>"; // codigo html da pagina inicial

// ------------------------------------------------------------------------------------




// retorno ------------------------------------------------------------------------

return $codigo_html_pagina; // retorno

// -----------------------------------------------------------------------------------




};

// ------------------------------------------------------------------------------------


?>