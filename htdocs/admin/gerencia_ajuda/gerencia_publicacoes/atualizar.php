<?php


// carrega todas as bibliotecas -------------------------------------

include("../../../servidor/dados_do_servidor.php"); // dados do servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// ----------------------------------------------------------------------------


// conecta-se ao banco de dados ----------------------------

conecta_mysql(); // conecta-se ao banco de dados

// ---------------------------------------------------------


// conecta-se ao banco de dados ---------------------------

conecta_banco_dados($banco_dados_nomes_array[3]); // conectando ao banco de dados

// --------------------------------------------------------


// atualiza publicacao ------------------------------------

atualiza_publicacao_ajuda(); // atualiza publicacao

// --------------------------------------------------------


// desconecta do banco de dados ---------------------------

desconecta_mysql(); // desconecta do banco de dados

// --------------------------------------------------------


?>