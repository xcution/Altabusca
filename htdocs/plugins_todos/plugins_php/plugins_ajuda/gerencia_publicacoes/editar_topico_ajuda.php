<?php


// edita o topico de ajuda --------------------------------

function editar_topico_ajuda(){
	
	
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

$pacote_imagens = monta_pacote_imagens_ajuda_editar($token_imagens); // pacote de imagens de publicacao

// --------------------------------------------------------


// campo adicionar imagens -----------------------

$campo_adicionar_imagens .= "<form action='atualizar.php' method='post' enctype='multipart/form-data'>"; // campo adicionar imagens
$campo_adicionar_imagens .= "<input type='file' name='foto[]' id='campo_file_upload_postagem' onchange='publicacao_imagens_selecionadas();' multiple>"; // campo adicionar imagens
$campo_adicionar_imagens .= "<br>"; // campo adicionar imagens
$campo_adicionar_imagens .= "<input type='submit' class='btn btn-success' value='Enviar imagens'>"; // campo adicionar imagens
$campo_adicionar_imagens .= "<input type='hidden' name='tipo_atualizar' value='3'>"; // campo adicionar imagens
$campo_adicionar_imagens .= "<input type='hidden' name='id_post' value='$id'>"; // campo adicionar imagens
$campo_adicionar_imagens .= "</form>"; // campo adicionar imagens
$campo_adicionar_imagens = constroe_div_especial_geral("Adicione mais imagens", $campo_adicionar_imagens, null); // campo adicionar imagens

// ---------------------------------------------------------


// codigo html bruto --------------------------------------

$codigo_html_bruto .= "<div class='div_titulo_campos_gerais'>"; // codigo html bruto
$codigo_html_bruto .= $titulo_post; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= "<form action='atualizar.php' method='post'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='tipo_atualizar' value='1'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='id_post' value='$id'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='text' name='titulo_post' class='form-control' value='$titulo_post' placeholder='Título'>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<textarea cols='15' rows='5' name='conteudo_post' class='form-control' placeholder='Publique aqui'>$conteudo_post</textarea>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<input type='submit' class='btn btn-primary' value='Atualizar'>"; // codigo html bruto
$codigo_html_bruto .= "</form>"; // codigo html bruto

// --------------------------------------------------------


// adicionar mais imagens ---------------------------------

$codigo_html_bruto .= $campo_adicionar_imagens; // codigo html bruto

// --------------------------------------------------------


// adiciona div especial ----------------------------------

$codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto);

// --------------------------------------------------------


// codigo html bruto --------------------------------------

$codigo_html_bruto .= $pacote_imagens; // codigo html bruto
$codigo_html_bruto .= div_especial_basica_campos($data_publicou); // codigo html bruto

// --------------------------------------------------------


// campo excluir postagem ---------------------------------

$codigo_html_bruto .= campo_excluir_publicacao_ajuda($id, $token_imagens); // campo excluir postagem

// --------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>