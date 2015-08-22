<?php


// carrega todas as bibliotecas ---------------------------

include("../servidor/dados_do_servidor.php"); // dados do servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// --------------------------------------------------------


// conecta-se ao banco de dados ---------------------------

conecta_mysql(); // conecta-se ao banco de dados

// --------------------------------------------------------


// valida campos e cadastra -------------------------------

include("valida_campos.php"); // valida campos e cadastra

// --------------------------------------------------------


// conteudo de pagina -------------------------------------

$conteudo_pagina .= "<div class='div_titulo_campos_gerais'>Adicione seu site no $nome_do_sistema</div>"; // conteudo de pagina
$conteudo_pagina .= "<li>Você tem um site ou blog?"; // conteudo de pagina
$conteudo_pagina .= "<li>Seu site ou blog é útil de alguma maneira?"; // conteudo de pagina
$conteudo_pagina .= "<li>Está sem grana para investir e exibir seu site para várias pessoas?"; // conteudo de pagina
$conteudo_pagina .= "<div class='div_titulo_campos_gerais'>Colaboremos então</div>"; // conteudo de pagina
$conteudo_pagina .= "Se você tem um site ou blog, e quer adicioná-lo no $nome_do_sistema, é só preencher os campos abaixo."; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<form action='index.php' method='post'>"; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<li>Endereço do seu site no formato: www.seusite.com.br"; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<input type='text' class='form-control' name='endereco_site' value='$endereco_site' placeholder='Seu site www.site.com.br'>"; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<li>Tipo de site"; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= campo_select_muda_tipo_busca_cadastro(); // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<br>"; // conteudo de pagina
$conteudo_pagina .= "<input type='submit' class='btn btn-primary' value='Cadastrar meu site'>"; // conteudo de pagina
$conteudo_pagina .= "&nbsp;"; // conteudo de pagina
$conteudo_pagina .= "&nbsp;"; // conteudo de pagina
$conteudo_pagina .= "<a href='$endereco_url_site_global[3]' title='Termos e privacidade' target='_blank'>Termos e privacidade</a>"; // conteudo de pagina
$conteudo_pagina .= "</form>"; // conteudo de pagina
$conteudo_pagina .= $_SESSION['site_erro_adicionar_mensagem']; // conteudo de pagina

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