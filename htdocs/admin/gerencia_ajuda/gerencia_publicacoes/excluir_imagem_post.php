<?php


// carrega todas as bibliotecas -------------------------------------

include("../../../servidor/dados_do_servidor.php"); // dados do servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// ----------------------------------------------------------------------------


// conecta-se ao banco de dados ----------------------------

conecta_mysql(); // conecta-se ao banco de dados

// ---------------------------------------------------------


// obtem o id de topico -----------------------------------

$topico = remove_html($_POST['id_topico']); // obtem o id de topico

// --------------------------------------------------------


// conecta-se ao banco de dados ---------------------------

conecta_banco_dados($banco_dados_nomes_array[3]); // conectando ao banco de dados

// --------------------------------------------------------


// exclui imagem de publicacao --------------------------------------

exclui_imagem_publicacao_ajuda(); // exclui publicacao

// --------------------------------------------------------


// desconecta do banco de dados ---------------------------

desconecta_mysql(); // desconecta do banco de dados

// --------------------------------------------------------


// redireciona para ajuda ---------------------------------

header("Location: editar.php?topico=$topico"); // redireciona para ajuda

// --------------------------------------------------------


?>