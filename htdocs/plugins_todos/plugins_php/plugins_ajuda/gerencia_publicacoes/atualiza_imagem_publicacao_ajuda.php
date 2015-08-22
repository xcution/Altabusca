<?php


// atualiza a imagem de publicacao de ajuda ---------------

function atualiza_imagem_publicacao_ajuda(){


// globals ------------------------------------------------

global $nome_prefixo_tabela_ajuda_imagens; // tabela de imagens

global $nome_prefixo_tabela_ajuda; // tabela de ajuda

global $pasta_arquivos; // pasta de arquivos

// --------------------------------------------------------


// dados de formulario ------------------------------------

$id_post = remove_html($_POST['id_post']); // id do post

$tipo_atualizar = remove_html($_POST['tipo_atualizar']); // tipo de atualizacao

// --------------------------------------------------------


// numero da imagens a atualizar --------------------------

$numero_imagens_atualizar = retorne_numero_imagens_publicar(); // numero da imagens a atualizar

// --------------------------------------------------------


// valida numero de imagens -------------------------------

if($numero_imagens_atualizar == 0 or $id_post == null){

return null; // retorno nulo

};

// --------------------------------------------------------


// query --------------------------------------------------

if($tipo_atualizar == 3){

$query = "select *from $nome_prefixo_tabela_ajuda where id='$id_post';"; // query

}else{
	
$query = "select *from $nome_prefixo_tabela_ajuda_imagens where id='$id_post';"; // query

};

// --------------------------------------------------------


// dados de query -----------------------------------------

$dados = retorne_dados_query($query); // dados de query

// --------------------------------------------------------


// separa dados -------------------------------------------

$id = $dados['id']; // dados

$destino_imagem = $dados['destino_imagem']; // dados

$token_imagens = $dados['token_imagens']; // token da imagem

// --------------------------------------------------------


// remove imagem antiga -----------------------------------

exclui_arquivo_unico($destino_imagem); // remove imagem antiga

// --------------------------------------------------------


// upload de nova imagem ----------------------------------

upload_de_imagem_album_ajuda($pasta_arquivos[1], $token_imagens); // upload de nova imagem

// --------------------------------------------------------


};

// --------------------------------------------------------


?>