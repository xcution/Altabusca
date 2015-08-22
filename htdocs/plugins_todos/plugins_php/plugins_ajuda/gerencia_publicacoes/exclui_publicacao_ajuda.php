<?php


// exclui a publicacao de ajuda ---------------------------

function exclui_publicacao_ajuda(){


// globals ------------------------------------------------

global $nome_prefixo_tabela_ajuda; // tabela de ajuda

global $nome_prefixo_tabela_ajuda_imagens; // tabela de imagens de ajuda

// --------------------------------------------------------


// dados de formulario ------------------------------------

$id_post = remove_html($_POST['id_post']); // id do post

$confirma_exclusao = remove_html($_POST['chk_confirma_exclusao']); // id do post

$token_imagens = remove_html($_POST['token_imagens']); // token de imagens

// --------------------------------------------------------


// valida exclusao ----------------------------------------

if($confirma_exclusao != 1 or $id_post == null){

return null; // retorno nulo

};

// --------------------------------------------------------


// query seleciona todas as imagens de token --------------

$query[0] = "select *from $nome_prefixo_tabela_ajuda_imagens where token_imagens='$token_imagens';"; // query
$query[1] = "delete from $nome_prefixo_tabela_ajuda_imagens where token_imagens='$token_imagens';"; // query
$query[2] = "delete from $nome_prefixo_tabela_ajuda where id='$id_post';"; // query

// --------------------------------------------------------


// comando ------------------------------------------------

$comando = comando_executa($query[0]); // comando

// --------------------------------------------------------


// numero de linhas ---------------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// --------------------------------------------------------


// contador -----------------------------------------------

$contador = 0; // contador

// --------------------------------------------------------


// apagando imagens fisicamente ---------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados --------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// --------------------------------------------------------


// separa dados -------------------------------------------

$id = $dados['id']; // dados
$token_imagens = $dados['token_imagens']; // dados
$conteudo_imagem = $dados['conteudo_imagem']; // dados
$destino_imagem = $dados['destino_imagem']; // dados
$data_publicou = $dados['data_publicou']; // dados

// --------------------------------------------------------


// remove a imagem ----------------------------------------

if($destino_imagem != null){

exclui_arquivo_unico($destino_imagem); // excluindo arquivo

};

// --------------------------------------------------------


};

// --------------------------------------------------------


// exclui referencia de imagens na tabela -----------------

comando_executa($query[1]); // exclui referencia de imagens na tabela

// --------------------------------------------------------


// exclui publicacao --------------------------------------

comando_executa($query[2]); // exclui publicacao

// --------------------------------------------------------


};

// --------------------------------------------------------


?>