<?php


// monta o topico de ajuda --------------------------------

function monta_topico_ajuda(){
	
	
// globals ------------------------------------------------

global $nome_prefixo_tabela_ajuda; // tabela de ajuda

global $pasta_arquivos; // pasta de arquivos

global $nome_do_sistema; // nome do sistema

// --------------------------------------------------------


// numero do id de topico de ajuda ------------------------

$id_topico = retorne_numero_topico_ajuda(); // numero do id de topico de ajuda

// --------------------------------------------------------


// valida topico de ajuda ---------------------------------

if($id_topico == null){

return null; // retorno nulo

};

// --------------------------------------------------------


// query --------------------------------------------------

$query[0] = "select *from $nome_prefixo_tabela_ajuda where id='$id_topico';"; // query

// --------------------------------------------------------


// comando ------------------------------------------------

$comando = comando_executa($query[0]); // comando

// --------------------------------------------------------


// dados --------------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// --------------------------------------------------------


// separa dados -------------------------------------------

$id = $dados['id']; // dados
$titulo_post = $dados['titulo_post']; // dados
$conteudo_post = $dados['conteudo_post']; // dados
$token_imagens = $dados['token_imagens']; // dados
$numero_imagens = $dados['numero_imagens']; // dados
$data_publicou = $dados['data_publicou']; // dados

// --------------------------------------------------------


// data de publicacao -------------------------------------

$data_publicou = converte_data_amigavel($data_publicou); // data de publicacao

// --------------------------------------------------------


// pacote de imagens de publicacao ------------------------

$pacote_imagens = monta_pacote_imagens_ajuda($token_imagens); // pacote de imagens de publicacao

// --------------------------------------------------------


// codigo html bruto --------------------------------------

$codigo_html_bruto .= "<div class='div_conteudo_publicacao_ajuda'>"; // codigo html bruto
$codigo_html_bruto .= "<div class='div_titulo_campos_gerais'>"; // codigo html bruto
$codigo_html_bruto .= $titulo_post; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= $conteudo_post; // codigo html bruto
$codigo_html_bruto .= $pacote_imagens; // codigo html bruto
$codigo_html_bruto .= div_especial_basica_campos($data_publicou); // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto

// --------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>