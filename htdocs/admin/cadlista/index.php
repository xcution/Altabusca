<?php


// carrega todas as bibliotecas -----------------

include("../../servidor/dados_do_servidor.php"); // dados do servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// --------------------------------------------------------


// conecta-se ao mysql ---------------------------

conecta_mysql(); // conecta-se ao mysql

// --------------------------------------------------------


// entensao de arquivo ---------------------------

$ensaocao_array[] = ".txt"; // entensao de arquivo

// --------------------------------------------------------


// fazendo upload se necessario --------------

$resposta_upload = upload_arquivo("temporaria/", $ensaocao_array); // fazendo upload se necessario

// --------------------------------------------------------


// conteudo de formulario ------------------------

if($resposta_upload == null){


// conteudo de formulario ------------------------

$conteudo_formulario .= "Cadlist é a lista de novos sites que serão cadastrados, "; // conteudo de formulario
$conteudo_formulario .= "para serem indexados."; // conteudo de formulario
$conteudo_formulario .= "<br>"; // conteudo de formulario
$conteudo_formulario .= "<br>"; // conteudo de formulario
$conteudo_formulario .= "1° Escolha o arquivo no formato .txt do cadlist"; // conteudo de formulario
$conteudo_formulario .= "<br>"; // conteudo de formulario
$conteudo_formulario .= "2° Faça o upload"; // conteudo de formulario
$conteudo_formulario .= "<br>"; // conteudo de formulario
$conteudo_formulario .= "3° Comece a indexar <a href='../indexar/'>aqui</a>"; // conteudo de formulario
$conteudo_formulario .= "<br>"; // conteudo de formulario

// --------------------------------------------------------


// adiciona formulario de upload ---------------

$codigo_html_bruto .= constroe_formulario_upload($endereco_url_arquivos_extras[0], false, null, $conteudo_formulario); // exibe codigo html

// --------------------------------------------------------


// adiciona div especial ---------------------------

$codigo_html_bruto = constroe_div_especial_geral("Carregar cadlist", $codigo_html_bruto, null); // adiciona div especial

// --------------------------------------------------------


}else{


// cadastra urls no servidor ---------------------

$lista_cadastrados = cadlist($resposta_upload); // cadastra urls no servidor

// --------------------------------------------------------


// exclui o arquivo de upload -------------------

exclui_arquivo_unico($resposta_upload); // exclui o arquivo de upload

// --------------------------------------------------------


// codigo html bruto -------------------------------

$codigo_html_bruto .= "Upload de <b>$resposta_upload</b>, concluída com sucesso."; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "Agora você já pode ir até <a href='../indexar/'>aqui</a> e indexar."; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= $lista_cadastrados; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto

// --------------------------------------------------------


// adiciona div especial ---------------------------

$codigo_html_bruto = constroe_div_especial_geral("Upload concluído", $codigo_html_bruto, null); // adiciona div especial

// --------------------------------------------------------


};

// --------------------------------------------------------


// monta a pagina ----------------------------------

$codigo_html_bruto = monta_pagina_basica($codigo_html_bruto); // monta a pagina

// --------------------------------------------------------


// exibe codigo html -------------------------------

echo $codigo_html_bruto; // exibe codigo html

// --------------------------------------------------------


// desconecta mysql ------------------------------

desconecta_mysql(); // desconecta do mysql

// -------------------------------------------------------


?>