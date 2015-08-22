<?php


// exclui a publicacao de ajuda ---------------------------

function exclui_imagem_publicacao_ajuda(){


// globals ------------------------------------------------

global $nome_prefixo_tabela_ajuda_imagens; // tabela de imagens de ajuda

// --------------------------------------------------------


// dados de formulario ------------------------------------

$id_post = remove_html($_POST['id_post']); // id do post

$confirma_exclusao = remove_html($_POST['chk_confirma_exclusao']); // id do post

// --------------------------------------------------------


// valida exclusao ----------------------------------------

if($confirma_exclusao != 1 or $id_post == null){

return null; // retorno nulo

};

// --------------------------------------------------------


// query seleciona todas as imagens de token --------------

$query[0] = "select *from $nome_prefixo_tabela_ajuda_imagens where id='$id_post';"; // query
$query[1] = "delete from $nome_prefixo_tabela_ajuda_imagens where id='$id_post';"; // query

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

$destino_imagem = $dados['destino_imagem']; // dados

// --------------------------------------------------------


// remove a imagem ----------------------------------------

if($destino_imagem != null){

exclui_arquivo_unico($destino_imagem); // excluindo arquivo

};

// --------------------------------------------------------


};

// --------------------------------------------------------


// exclui imagem na tabela --------------------------------

comando_executa($query[1]); // exclui imagem na tabela

// --------------------------------------------------------


};

// --------------------------------------------------------


?>