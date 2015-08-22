<?php


// monta pacote de imagens de ajuda -----------------------

function monta_pacote_imagens_ajuda($token_imagens){


// globals ------------------------------------------------

global $nome_prefixo_tabela_ajuda_imagens; // tabela de imagens de ajuda

global $endereco_url_site_global; // endereco de url de site

// --------------------------------------------------------


// query --------------------------------------------------

$query = "select *from $nome_prefixo_tabela_ajuda_imagens where token_imagens='$token_imagens';"; // query

// --------------------------------------------------------


// comando ------------------------------------------------

$comando = comando_executa($query); // comando

// --------------------------------------------------------


// contador -----------------------------------------------

$contador = 0; // contador

// --------------------------------------------------------


// numero de linhas ---------------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// --------------------------------------------------------


// montando imagens ---------------------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


// obtendo dados ------------------------------------------

$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados

// --------------------------------------------------------


// separa dados -------------------------------------------

$id = $dados['id']; // dados
$token_imagens = $dados['token_imagens']; // dados
$conteudo_imagem = $dados['conteudo_imagem']; // dados
$destino_imagem = $dados['destino_imagem']; // dados
$data_publicou = $dados['data_publicou']; // dados

// --------------------------------------------------------


// url da imagem ------------------------------------------

$destino_imagem = basename($destino_imagem); // url da imagem

$destino_imagem = $endereco_url_site_global[4].$destino_imagem; // url da imagem

// --------------------------------------------------------


// valida id de imagem ------------------------------------

if($id != null){


// imagem montada -----------------------------------------

$imagem_montada .= "<div class='div_imagem_publicacao_ajuda'>"; // imagem montada
$imagem_montada .= "<img src='$destino_imagem' class='imagem_publicacao_ajuda'>"; // imagem montada
$imagem_montada .= "<br>"; // imagem montada
$imagem_montada .= "<div class='div_conteudo_publicacao_ajuda'>"; // imagem montada
$imagem_montada .= $conteudo_imagem; // imagem montada
$imagem_montada .= "</div>"; // imagem montada
$imagem_montada .= "</div>"; // imagem montada

// --------------------------------------------------------


// codigo html bruto --------------------------------------

$codigo_html_bruto .= $imagem_montada; // codigo html bruto

// --------------------------------------------------------


// limpa imagem montada -----------------------------------

$imagem_montada = null; // limpa imagem montada

// --------------------------------------------------------


};

// --------------------------------------------------------


};

// --------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>