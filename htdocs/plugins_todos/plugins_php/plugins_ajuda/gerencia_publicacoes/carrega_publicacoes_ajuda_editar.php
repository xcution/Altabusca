<?php


// carrega publicacoes no modo editar ---------------------

function carrega_publicacoes_ajuda_editar(){

// globals ------------------------------------------------

global $nome_prefixo_tabela_ajuda; // tabela de ajuda

global $pasta_arquivos; // pasta de arquivos

global $nome_do_sistema; // nome do sistema

// --------------------------------------------------------


// limite de query ----------------------------------------

$limite = limit_query_topicos(); // limite de query

// --------------------------------------------------------


// termo de pesquisa --------------------------------------

$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa

// --------------------------------------------------------


// query --------------------------------------------------

$query[0] = "select *from $nome_prefixo_tabela_ajuda where conteudo_post like '%$termo_pesquisa%' $limite;"; // query

$query[1] = "select *from $nome_prefixo_tabela_ajuda where conteudo_post like '%$termo_pesquisa%';"; // query

// --------------------------------------------------------


// comando ------------------------------------------------

$comando = comando_executa($query[0]); // comando

// --------------------------------------------------------


// contador -----------------------------------------------

$contador = 0; // contador

// --------------------------------------------------------


// numero de linhas ---------------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// --------------------------------------------------------


// topicos de ajuda ---------------------------------------

$codigo_html_bruto .= "<div class='div_titulo_campos_gerais'>"; // codigo html bruto
$codigo_html_bruto .= "Tópicos cadastrados"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto

// --------------------------------------------------------


// montando topicos ---------------------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){


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


// url de topico de ajuda ---------------------------------

$url_topico_ajuda = "editar.php?topico=$id"; // url de topico de ajuda

// --------------------------------------------------------


// conteudo de topico -------------------------------------

if($id != null){


// conteudo de topico -------------------------------------

$conteudo_topico .= "<li>"; // conteudo de topico
$conteudo_topico .= "<a href='$url_topico_ajuda' title='$titulo_post'>"; // conteudo de topico
$conteudo_topico .= $titulo_post; // conteudo de topico
$conteudo_topico .= "</a>"; // conteudo de topico

// --------------------------------------------------------


// adiciona div especial de campos ------------------------

$conteudo_topico = div_especial_basica_campos($conteudo_topico); // adiciona div especial de campos

// --------------------------------------------------------


// atualiza codigo de retorno -----------------------------

$codigo_html_bruto .= $conteudo_topico; // atualiza codigo de retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


// limpa conteudo de topico -------------------------------

$conteudo_topico = null; // limpa conteudo de topico

// --------------------------------------------------------


};

// --------------------------------------------------------


// numero de linhas ---------------------------------------

$numero_linhas = retorne_numero_linhas_query($query[1]); // numero de linhas

// --------------------------------------------------------


// codigo html bruto --------------------------------------

$codigo_html_bruto .= paginacao_topicos($numero_linhas); // codigo html bruto

// --------------------------------------------------------


// adiciona formulario de pesquisa ------------------------

$codigo_html_bruto = formulario_pesquisa_ajuda().$codigo_html_bruto; // adiciona formulario de pesquisa

// --------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------

};

// --------------------------------------------------------


?>