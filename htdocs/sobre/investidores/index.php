<?php


// carrega todas as bibliotecas ---------------------------

include("../../servidor/dados_do_servidor.php"); // dados do servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// --------------------------------------------------------


// conecta-se ao banco de dados ---------------------------

conecta_mysql(); // conecta-se ao banco de dados

// --------------------------------------------------------


// valida mensagem ----------------------------------------

include("valida_mensagem.php"); // valida mensagem

// --------------------------------------------------------


// conteudo de pagina -------------------------------------

$conteudo_pagina .= "<div class='div_titulo_campos_gerais'>"; // conteudo de pagina
$conteudo_pagina .= "<img src='imagens/imagem_0.png' title='Investimentos'>"; // conteudo de pagina
$conteudo_pagina .= "&nbsp;"; // conteudo de pagina
$conteudo_pagina .= "Investidores"; // conteudo de pagina
$conteudo_pagina .= "</div>"; // conteudo de pagina
$conteudo_pagina .= "<font size='3'>"; // conteudo de pagina
$conteudo_pagina .= "\"Se você é um investidor anjo, e busca por uma grande idéia para investir, "; // conteudo de pagina
$conteudo_pagina .= "então você chegou ao lugar certo.\""; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "$nome_do_sistema é uma boa Startup a receber investimento."; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "Temos grandes idéias para um grande negócio, para grandes investidores."; // conteudo de pagina
$conteudo_pagina .= "</font>"; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<div class='div_titulo_campos_gerais'>"; // conteudo de pagina
$conteudo_pagina .= "Contato"; // conteudo de pagina
$conteudo_pagina .= "</div>"; // conteudo de pagina
$conteudo_pagina .= $_SESSION['mensagem_erro']; // conteudo de pagina
$conteudo_pagina .= "<form action='index.php' method='post'>"; // conteudo de pagina
$conteudo_pagina .= "<input type='text' value='$telefone' name='telefone' placeholder='Telefone'>"; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<input type='text' value='$email' name='email' placeholder='E-mail'>"; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<textarea cols='5' rows='5' name='mensagem' placeholder='Mensagem'>$mensagem</textarea>"; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<input type='submit' class='btn btn-primary' value='Enviar mensagem'>"; // conteudo de pagina
$conteudo_pagina .= "</form>"; // conteudo de pagina

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