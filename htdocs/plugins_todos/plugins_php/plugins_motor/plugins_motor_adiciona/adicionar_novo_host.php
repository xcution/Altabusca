<?php




// funcao para adicionar novo host ------------------------------------------

function adicionar_novo_host($endereco_url_site){




// globals --------------------------------------------------------------------------

global $nome_banco; // nome do banco de dados a salvar

global $numero_maximo_registros_busca_inteligente; // numero maximo de registros por banco de dados

global $banco_dados_atingiu_limite_resposta; // informa se para ou continua adicao de novos sites

global $array_links_host_diferente; // array com links de hosts diferentes

// --------------------------------------------------------------------------------------




// nao permite continuar se url nao for valida ------------------------------

if($endereco_url_site == null){

return false; // retorna falso

};

// --------------------------------------------------------------------------------------




// dados de cabecalho de host, url --------------------------------------------

$dados_cabecalho_host_url = parse_url($endereco_url_site); // dados

// --------------------------------------------------------------------------------------




// protocolo do host do site ------------------------------------------------------

$protocolo_host_site = $dados_cabecalho_host_url['scheme']; // protocolo do host do site

// --------------------------------------------------------------------------------------




// adiciona protocolo http ao host do site ------------------------------------

if($protocolo_host_site == null){


$endereco_url_site = "http://".$endereco_url_site; // adiciona protocolo http ao host do site


};

// --------------------------------------------------------------------------------------




// seleciona banco de dados ----------------------------------------------------

mysql_select_db($nome_banco); // seleciona banco de dados

// ------------------------------------------------------------------------------------------




// retorna o numero de registros no banco de dados --------------------

$numero_registros_banco_dados = retorne_numero_registros_banco_dados($nome_banco); // retorna o numero de registros no banco de dados

// --------------------------------------------------------------------------------------




// verifica se o banco atintiu o limite de dados ----------------------------

if($numero_registros_banco_dados > $numero_maximo_registros_busca_inteligente){

$banco_dados_atingiu_limite_resposta = true; // informa para parar

};

// --------------------------------------------------------------------------------------




// codigo html do site ----------------------------------------------------------

$codigo_html_site = url_get_contents($endereco_url_site); // codigo html do site

// --------------------------------------------------------------------------------------




// codifica para unicode se necessario --------------------------------------------------

$codigo_html_site = codificacao_unicode($codigo_html_site); // codificando

// --------------------------------------------------------------------------------------




// dados gerais do site --------------------------------------------------------

$dados_gerais_site = retorne_dados_gerais_site($codigo_html_site, $endereco_url_site); // dados gerais do site

// --------------------------------------------------------------------------------------




// enderecos url de site --------------------------------------------------------

$enderecos_url_site_array = retorna_links_endereco_url($codigo_html_site, $endereco_url_site); // enderecos url de site

// --------------------------------------------------------------------------------------




// array com imagens do site ------------------------------------------------

$imagens_site_array_url = retorna_imagens_endereco_url($codigo_html_site, $endereco_url_site); // imagens do site

// --------------------------------------------------------------------------------------




// dados de links ----------------------------------------------------------------

$dados_links = separa_dados_obtidos_links_salvar($enderecos_url_site_array); // dados de links

// --------------------------------------------------------------------------------------




// valida numero de links do site ---------------------------------------------

if(count($dados_links) == 0){

return null; // retorno nulo

};

// --------------------------------------------------------------------------------------




// contador --------------------------------------------------------------------------

$contador = 0; // contador

// ----------------------------------------------------------------------------------------




// separando dados de links de site ------------------------------------------

for($contador == $contador; $contador <= count($dados_links); $contador++){




// obtendo listas de links --------------------------------------------------------

$titulo_link_lista .= $dados_links[$contador][0]; // titulos de links

$url_link_lista .= $dados_links[$contador][1]; // titulos de links

// ----------------------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------------------




// contador --------------------------------------------------------------------------

$contador = 0; // contador

// ----------------------------------------------------------------------------------------




// separando dados de links de site ------------------------------------------

for($contador == $contador; $contador <= count($array_links_host_diferente); $contador++){




// obtendo listas de links --------------------------------------------------------

$titulo_link_host_diferente_lista .= $dados_links[$contador][0]; // titulos de links

$url_link_host_diferente_lista .= $dados_links[$contador][1]; // titulos de links

// ----------------------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------------------




// dados array de imagens ------------------------------------------------------

$dados_imagens = $imagens_site_array_url; // dados array de imagens

// ------------------------------------------------------------------------------------------




// contador ----------------------------------------------------------------------------

$contador = 0; // contador

// ------------------------------------------------------------------------------------------




// separando dados de imagem ----------------------------------------------

for($contador == $contador; $contador <= count($dados_imagens); $contador++){




// obtendo dados da imagem --------------------------------------------------

$dados_array_imagem = $dados_imagens[$contador]; // dados

// ------------------------------------------------------------------------------------------




// separando dados da imagem ------------------------------------------------

$imagem_url_lista .= $dados_array_imagem[$contador][0]; // url

$imagem_titulo_lista .= $dados_array_imagem[$contador][1]; // titulo

$imagem_alt_lista .= $dados_array_imagem[$contador][2]; // alt

// ------------------------------------------------------------------------------------------




};

// ------------------------------------------------------------------------------------------




// dados basicos do site ----------------------------------------------------------

$titulo_site = $dados_gerais_site['title']; // titulo do site

$url_pagina = $endereco_url_site; // url da pagina

$descricao_site = $dados_gerais_site['description'];// descricao do site

$palavras_chave_site = $dados_gerais_site['keywords']; // palavras chave do site

$host_site = retorna_host_url($endereco_url_site); // host do site

$tabela_salvar_site = retorne_tabela_salvar_site(); // tabela para salvar o site

$data = date('d:m:y'); // data

// ------------------------------------------------------------------------------------------




// remove codificacao especial de dados ------------------------------------

$host_site = remove_html($host_site); // remove codigo especial

$url_pagina = remove_html($url_pagina); // remove codigo especial

$titulo_site = remove_html($titulo_site); // remove codigo especial

$palavras_chave_site = remove_html($palavras_chave_site); // remove codigo especial

$descricao_site = remove_html($descricao_site); // remove codigo especial

$url_link_lista = remove_html($url_link_lista); // remove codigo especial

$url_link_host_diferente_lista = remove_html($url_link_host_diferente_lista); // remove codigo especial

$imagem_url_lista = remove_html($imagem_url_lista); // remove codigo especial

$conteudo_site = remove_html($codigo_html_site); // remove codigo especial

$data = remove_html($data); // remove codigo especial

// ------------------------------------------------------------------------------------------




// query para atualizar tabela ----------------------------------------------------

$query_atualizar_tabela .= "'null', "; // query para atualizar tabela

$query_atualizar_tabela .= "'$url_pagina', "; // query para atualizar tabela

$query_atualizar_tabela .= "'$host_site', "; // query para atualizar tabela

$query_atualizar_tabela .= "'$titulo_site', "; // query para atualizar tabela

$query_atualizar_tabela .= "'$palavras_chave_site', "; // query para atualizar tabela

$query_atualizar_tabela .= "'$descricao_site', "; // query para atualizar tabela

$query_atualizar_tabela .= "'$url_link_lista', "; // query para atualizar tabela

$query_atualizar_tabela .= "'$url_link_host_diferente_lista', "; // query para atualizar tabela

$query_atualizar_tabela .= "'$imagem_url_lista', "; // query para atualizar tabela

$query_atualizar_tabela .= "'$conteudo_site', "; // query para atualizar tabela

$query_atualizar_tabela .= "'$data'"; // query para atualizar tabela

// ------------------------------------------------------------------------------------------




// resposta se o host esta cadastrado ou e novo --------------------------

$host_cadastrado_resposta = retorne_host_cadastrado_existe($host_site); // resposta se o host esta cadastrado ou e novo

// ------------------------------------------------------------------------------------------




// salvando no banco de dados --------------------------------------------------

if($host_site != null){




// query ----------------------------------------------------------------------------------

$query[1] = "delete from $tabela_salvar_site where host_site='$host_site';"; // query para remover dados

$query[2] = "insert into $tabela_salvar_site values($query_atualizar_tabela);"; // query

// --------------------------------------------------------------------------------------------




// executa o comando query ------------------------------------------------------

if($host_cadastrado_resposta == false){




// novo host ------------------------------------------------------------------------------

comando_executa($query[2]); // executa o comando query

// --------------------------------------------------------------------------------------------




}else{




// atualiza host existente ----------------------------------------------------------

comando_executa($query[1]); // executa o comando query

comando_executa($query[2]); // executa o comando query

// --------------------------------------------------------------------------------------------




};

// --------------------------------------------------------------------------------------------




};

// --------------------------------------------------------------------------------------------




// mensagem de sucesso ----------------------------------------------------------

$mensagem_sucesso .= "$host_site"; // mensagem de sucesso
$mensagem_sucesso .= "&nbsp;"; // mensagem de sucesso
$mensagem_sucesso .= "adicionado com sucesso."; // mensagem de sucesso

// --------------------------------------------------------------------------------------------




// mensagem de sucesso ------------------------------------------------------------

echo $mensagem_sucesso; // mensagem de sucesso

// --------------------------------------------------------------------------------------------




};

// --------------------------------------------------------------------------------------------




?>