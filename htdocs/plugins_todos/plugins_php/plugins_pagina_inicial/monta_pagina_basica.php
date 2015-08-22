<?php


// monta pagina basica ------------------------------------------------------

function monta_pagina_basica($conteudo_pagina){


// globals ------------------------------------------------------------------------

global $nome_do_sistema; // nome do sistema

global $descricao_basica_site_meta_tag; // descricao do site

global $nome_desenvolvedor_projeto; // nome do desenvolvedor

global $tags_site; // tags do site

global $endereco_url_arquivos; // endereco url de arquivos

// ------------------------------------------------------------------------------------


// titulo da pagina ------------------------------------------------------------

$titulo_pagina = $nome_do_sistema; // titulo da pagina

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
$codigo_html_pagina .= $conteudo_pagina; // codigo html da pagina inicial
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