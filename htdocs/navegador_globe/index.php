<?php


// carrega todas as bibliotecas ---------------------------

include("../servidor/dados_do_servidor.php"); // dados do servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// --------------------------------------------------------


// variaveis locais ---------------------------------------

$nome_navegador = "<b>Internet Globe</b>"; // Nome do navegador

// --------------------------------------------------------


// conecta-se ao banco de dados ---------------------------

conecta_mysql(); // conecta-se ao banco de dados

// --------------------------------------------------------


// conteudo de pagina -------------------------------------

$conteudo_pagina .= "<div class='div_titulo_campos_gerais'>"; // conteudo de pagina
$conteudo_pagina .= "Navegador Internet Globe"; // conteudo de pagina
$conteudo_pagina .= "</div>"; // conteudo de pagina
$conteudo_pagina .= "<p align='center'>"; // conteudo de pagina
$conteudo_pagina .= "<font size='3'>"; // conteudo de pagina
$conteudo_pagina .= "$nome_navegador é um navegador capaz de ler textos."; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "$nome_navegador é um navegador cheio de temas legais, e você pode ouvir textos, e até "; // conteudo de pagina
$conteudo_pagina .= "convertê-los em áudio."; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<img src='imagens/internetglobe.png' title='Internet Globe'>"; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<a href='$url_servico_externo[1]' title='Download do Internet Globe' class='btn btn-primary'>Download</a>"; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<img src='imagens/img_0.png' title='Hospedado em softonic.com.br'>"; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "</font>"; // conteudo de pagina
$conteudo_pagina .= ""; // conteudo de pagina
$conteudo_pagina .= ""; // conteudo de pagina
$conteudo_pagina .= ""; // conteudo de pagina
$conteudo_pagina .= ""; // conteudo de pagina

// --------------------------------------------------------


// adiciona construtor de pagina --------------------------

$codigo_html_bruto = monta_pagina_basica($conteudo_pagina); // constroe a pagina

// --------------------------------------------------------


// desconecta do banco de dados ---------------------------

desconecta_mysql(); // desconecta do banco de dados

// --------------------------------------------------------


// exibe codigo html --------------------------------------

echo $codigo_html_bruto; // exibe codigo html

// --------------------------------------------------------


?>