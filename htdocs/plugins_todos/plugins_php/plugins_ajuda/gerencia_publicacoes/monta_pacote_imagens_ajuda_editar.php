<?php


// monta pacote de imagens de ajuda modo editar -----------

function monta_pacote_imagens_ajuda_editar($token_imagens){


// globals ------------------------------------------------

global $nome_prefixo_tabela_ajuda_imagens; // tabela de imagens de ajuda

global $endereco_url_site_global; // endereco de url de site

// --------------------------------------------------------


// numero do id de topico de ajuda ------------------------

$id_topico = retorne_numero_topico_ajuda(); // numero do id de topico de ajuda

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

$campo_imagem_publicacao .= "<form action='atualizar.php' method='post' enctype='multipart/form-data'>"; // imagem montada
$campo_imagem_publicacao .= "<input type='hidden' name='tipo_atualizar' value='2'>"; // imagem montada
$campo_imagem_publicacao .= "<input type='hidden' name='id_post' value='$id'>"; // imagem montada
$campo_imagem_publicacao .= "<input type='hidden' name='id_topico' value='$id_topico'>"; // imagem montada
$campo_imagem_publicacao .= "<div class='div_imagem_publicacao_ajuda'>"; // imagem montada
$campo_imagem_publicacao .= "<img src='$destino_imagem' class='imagem_publicacao_ajuda'>"; // imagem montada
$campo_imagem_publicacao .= "<br>"; // imagem montada
$campo_imagem_publicacao .= "<input type='file' name='foto[]'>"; // imagem montada
$campo_imagem_publicacao .= "<br>"; // imagem montada
$campo_imagem_publicacao .= "<textarea cols='15' rows='5' name='conteudo_post'>$conteudo_imagem</textarea>"; // imagem montada
$campo_imagem_publicacao .= "<br>"; // imagem montada
$campo_imagem_publicacao .= "<input type='submit' value='Salvar' class='btn btn-primary'>"; // imagem montada
$campo_imagem_publicacao .= "</div>"; // imagem montada
$campo_imagem_publicacao .= "</form>"; // imagem montada

// --------------------------------------------------------


// adiciona formulario de exclusao de imagem --------------

$campo_imagem_publicacao .= campo_excluir_imagem_publicacao($id, $id_topico); // imagem montada

// --------------------------------------------------------


// adiciona div especial ----------------------------------

$campo_imagem_publicacao = div_especial_basica_campos($campo_imagem_publicacao); // adiciona div especial

// --------------------------------------------------------


// codigo html bruto --------------------------------------

$codigo_html_bruto .= $campo_imagem_publicacao; // codigo html bruto

// --------------------------------------------------------


// limpa imagem montada -----------------------------------

$campo_imagem_publicacao = null; // limpa imagem montada

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