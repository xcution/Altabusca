<?php


// carrega bibliotecas -----------------------------------------------

include("../../servidor/dados_do_servidor.php"); // dados do servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// ------------------------------------------------------------------


// conecta-se ao banco de dados ----------------------------

conecta_mysql(); // conecta-se ao banco de dados

// ---------------------------------------------------------


// remove o host ------------------------------------------

remove_host(); // remove o host

// --------------------------------------------------------


// desconecta do banco de dados ---------------------------

desconecta_mysql(); // desconecta do banco de dados

// --------------------------------------------------------


?>