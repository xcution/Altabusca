<?php


// campo de entrada de ajuda ------------------------------

function campo_entrada_conteudo_ajuda(){


// globals ------------------------------------------------

global $endereco_url_arquivos_extras; // url de arquivos php

// --------------------------------------------------------


// campo adicionar imagens -----------------------

$campo_adicionar_imagens = "<input type='file' name='foto[]' id='campo_file_upload_postagem' onchange='publicacao_imagens_selecionadas();' multiple>"; // campo adicionar imagens

// ---------------------------------------------------------


// codigo html bruto --------------------------------------

$codigo_html_bruto .= "<form action='$endereco_url_arquivos_extras[1]' method='post' enctype='multipart/form-data'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='text' name='titulo_post' placeholder='Título'>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<textarea cols='10' rows='8' name='conteudo_post' class='form-control' placeholder='Publique aqui'></textarea>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<input type='submit' class='btn btn-primary' value='Publicar'>"; // codigo html bruto	
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= $campo_adicionar_imagens; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<output id='output_imagens_upload_publicacao'></output>"; // codigo html bruto
$codigo_html_bruto .= "</form>"; // codigo html bruto	

// --------------------------------------------------------


// adiciona div especial ----------------------------------

$codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); // adiciona div especial

// --------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------
	
	
};

// --------------------------------------------------------


?>