<?php


// cadastra a imagem de ajuda -----------------------------

function cadastra_imagem_ajuda($token_imagens, $destino_imagem){


// globals ------------------------------------------------

global $nome_prefixo_tabela_ajuda_imagens; // tabela de imagens de ajuda

// --------------------------------------------------------


// dados de formulario ------------------------------------

$id_post = remove_html($_POST['id_post']); // id do post

$tipo_atualizar = remove_html($_POST['tipo_atualizar']); // tipo de atualizacao

// --------------------------------------------------------


// data atual ---------------------------------------------

$data = data_atual(); // data atual

// --------------------------------------------------------


// query --------------------------------------------------

if($id_post == null){

$query = "insert into $nome_prefixo_tabela_ajuda_imagens values(null, '$token_imagens', null, '$destino_imagem', '$data');"; // query

}else{

$query = "update $nome_prefixo_tabela_ajuda_imagens set destino_imagem='$destino_imagem' where id='$id_post';"; // query atualiza

};

// --------------------------------------------------------


// aqui adiciona mais imagens em postagem que ja existe ---

if($tipo_atualizar == 3){

$query = "insert into $nome_prefixo_tabela_ajuda_imagens values(null, '$token_imagens', null, '$destino_imagem', '$data');"; // query

};

// --------------------------------------------------------


// comando ------------------------------------------------

$comando = comando_executa($query); // comando

// --------------------------------------------------------


};

// --------------------------------------------------------


?>