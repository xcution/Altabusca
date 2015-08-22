<?php


// publica ajuda ------------------------------------------

function publica_ajuda(){


// globals ------------------------------------------------

global $nome_prefixo_tabela_ajuda; // tabela de ajuda

global $pasta_arquivos; // pasta de arquivos

// --------------------------------------------------------


// dados de formulario ------------------------------------

$titulo_post = remove_html($_POST['titulo_post']); // titulo de post

$conteudo_post = remove_html($_POST['conteudo_post']); // conteudo

// --------------------------------------------------------


// valida conteudo ----------------------------------------

if($titulo_post == null or $conteudo_post == null){

return null; // retorno nulo

};

// --------------------------------------------------------


// token de imagens ---------------------------------------

$token_imagens = gera_idalbum_postagem_usuario(); // token de imagens

// --------------------------------------------------------


// data atual ---------------------------------------------

$data = data_atual(); // data atual

// --------------------------------------------------------


// numero de imagens --------------------------------------

$numero_imagens = retorne_numero_imagens_publicar(); // numero de imagens

// --------------------------------------------------------


// query --------------------------------------------------

$query = "insert into $nome_prefixo_tabela_ajuda values(null, '$titulo_post', '$conteudo_post', '$token_imagens', '$numero_imagens', '$data');"; // query

// --------------------------------------------------------


// comando ------------------------------------------------

$comando = comando_executa($query); // comando

// --------------------------------------------------------


// cria pasta de imagens se nao existir -------------------

criar_pasta($pasta_arquivos[1]); // cria pasta de imagens se nao existir

// --------------------------------------------------------


// faz upload de imagens ----------------------------------

upload_de_imagem_album_ajuda($pasta_arquivos[1], $token_imagens); // faz upload de imagens

// --------------------------------------------------------


};

// --------------------------------------------------------


?>