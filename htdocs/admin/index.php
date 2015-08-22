<?php


// carrega todas as bibliotecas ---------------------------

include("../servidor/dados_do_servidor.php"); // dados do servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// --------------------------------------------------------


// conecta-se ao banco de dados ---------------------------

conecta_mysql(); // conecta-se ao banco de dados

// --------------------------------------------------------


// seleciona o banco de dados, se necessario --------------



// --------------------------------------------------------


// conteudo de pagina -------------------------------------

$conteudo_pagina = constroe_pagina_admin(); // conteudo de pagina

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