<?php


// barra de rodape de pagina inicial ----------------------------------------

function barra_rodape_pagina_inicial(){


// globals ------------------------------------------------------------------------

global $nome_do_sistema; // nome do sistema

global $url_do_servidor; // url de servidor

global $imagem_de_logotipo; // imagem de logotipo

global $endereco_url_site_global; // enderecos urls de sites

global $endereco_url_arquivos_extras; // url de arquivos extras

// ----------------------------------------------------------------------------------


// barra de rodape de pagina inicial ----------------------------------------

$barra_rodape .= "<div id='div_barra_rodape_pagina_inicial'>"; // barra de rodape de pagina inicial
$barra_rodape .= $imagem_de_logotipo; // barra de rodape de pagina inicial
$barra_rodape .= "<br>"; // barra de rodape de pagina inicial
$barra_rodape .= "<br>"; // barra de rodape de pagina inicial
$barra_rodape .= "<a href='$url_do_servidor' title='$nome_do_sistema'>$nome_do_sistema</a>"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "-"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "<a href='$endereco_url_site_global[2]' title='Sobre'>Sobre $nome_do_sistema</a>"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "-"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "<a href='$endereco_url_site_global[3]' title='Termos e privacidade'>Termos e privacidade</a>"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "-"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "<a href='$endereco_url_site_global[1]' title='Investidores'>Investidores</a>"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "-"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "<a href='$endereco_url_arquivos_extras[2]' title='AJuda'>Ajuda</a>"; // barra de rodape de pagina inicial
$barra_rodape .= "</div>"; // barra de rodape de pagina inicial

// --------------------------------------------------------------------------------------


// retorno ----------------------------------------------------------------------------

return $barra_rodape; // retorno

// --------------------------------------------------------------------------------------


};

// --------------------------------------------------------------------------------------


?>