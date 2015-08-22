<?php


// atualiza a publicacao de ajuda -------------------------

function atualiza_publicacao_ajuda(){


// globals ------------------------------------------------

global $nome_prefixo_tabela_ajuda; // tabela de ajuda

global $nome_prefixo_tabela_ajuda_imagens; // tabela de imagens de ajuda

// --------------------------------------------------------


// dados de formulario ------------------------------------

$id_post = remove_html($_POST['id_post']); // id do post

$id_topico = remove_html($_POST['id_topico']); // id de topico

$titulo_post = remove_html($_POST['titulo_post']); // titulo do post

$conteudo_post = remove_html($_POST['conteudo_post']); // conteudo do post

$tipo_atualizar = remove_html($_POST['tipo_atualizar']); // tipo de atualizacao

// --------------------------------------------------------


// query --------------------------------------------------

switch($tipo_atualizar){
	
	
case 1:
$query = "update $nome_prefixo_tabela_ajuda set titulo_post='$titulo_post', conteudo_post='$conteudo_post' where id='$id_post';"; // query
break;


case 2:
$query = "update $nome_prefixo_tabela_ajuda_imagens set conteudo_imagem='$conteudo_post' where id='$id_post';"; // query
break;


};

// --------------------------------------------------------


// atualiza a imagem de publicacao de ajuda ---------------

atualiza_imagem_publicacao_ajuda(); // atualiza a imagem de publicacao de ajuda

// --------------------------------------------------------


// executa comando ----------------------------------------

$comando = comando_executa($query); // executa comando

// --------------------------------------------------------


// volta para a pagina ------------------------------------

switch($tipo_atualizar){


case 1:
header("Location: editar.php?topico=$id_post"); // volta para a pagina
break;


case 2:
header("Location: editar.php?topico=$id_topico"); // volta para a pagina
break;


default:
header("Location: editar.php?topico=$id_post"); // volta para a pagina


};

// --------------------------------------------------------


};

// --------------------------------------------------------


?>