<?php


// inicia a sessao ----------------------------------------

session_start(); // inicia a sessao

// --------------------------------------------------------


// numero de itens de post --------------------------------

$numero_itens_post = retorne_numero_itens_array_post(); // numero de itens de post

// --------------------------------------------------------


// dados de formulario ------------------------------------

$endereco_site = remove_html($_POST['endereco_site']); // endereco de site

$tipo_site = remove_html($_POST['tipo_site']); // tipo de site

// --------------------------------------------------------


// informa se encontrou erro no formulario ----------------

$encontrou_erro_formulario = false; // informa se encontrou erro no formulario

$pode_enviar_site = true; // pode enviar site

// --------------------------------------------------------


// valida todos os campos -----------------------

if($endereco_site == null or $tipo_site == null){


// informa que nao pode enviar site -------------

$pode_enviar_site = false; // informa que nao pode enviar site

// ----------------------------------------------


};

// ----------------------------------------------


// valida campos --------------------------------

if($numero_itens_post > 0){


// valida campo ---------------------------------

if($endereco_site == null){


// site de erro ---------------------------------

$site_informacao .= "O site não é válido."; // site de erro
$site_informacao .= "<br>"; // site de erro
$site_informacao .= "Site: "; // site de erro
$site_informacao .= $endereco_site; // site de erro

// ----------------------------------------------


// informa que encontrou erro -------------------

$encontrou_erro_formulario = true; // encontrou erro

// ----------------------------------------------


};

// ----------------------------------------------


// valida campo ---------------------------------

if($tipo_site == null){


// site de erro -----------------------------

$site_informacao .= "O tipo de site não é válido."; // site de erro
$site_informacao .= "<br>"; // site de erro
$site_informacao .= "Site: "; // site de erro
$site_informacao .= $endereco_site; // site de erro

// ----------------------------------------------


// informa que encontrou erro -------------------

$encontrou_erro_formulario = true; // encontrou erro

// ----------------------------------------------


};

// ----------------------------------------------


// adiciona div especial ------------------------

if($encontrou_erro_formulario == true){


// adiciona div especial ------------------------

$site_informacao = div_especial_mensagem_sistema("Ops!", $site_informacao); // adiciona div especial

// ----------------------------------------------


// site de erro -----------------------------

$_SESSION['site_erro_adicionar_mensagem'] = $site_informacao; // site de erro

// ----------------------------------------------


};

// ----------------------------------------------


// envia site -----------------------------------

if($pode_enviar_site == true){


// site de sucesso ------------------------------

$site_informacao .= "Site cadastrado com sucesso."; // site de sucesso
$site_informacao .= "<br>"; // site de erro
$site_informacao .= "Site: "; // site de erro
$site_informacao .= $endereco_site; // site de erro

// ----------------------------------------------


// adiciona div especial ------------------------

$site_informacao = div_especial_sucesso("Site cadastrado", $site_informacao); // adiciona div especial

// ----------------------------------------------


// site de sucesso ------------------------------

$_SESSION['site_erro_adicionar_mensagem'] = $site_informacao; // site de sucesso

// ----------------------------------------------


// cadastra site --------------------------------

include("cadastra_site.php"); // cadastra site

// ----------------------------------------------


// recarrega index ------------------------------

header("Location: index.php"); // recarrega index

// ----------------------------------------------


};

// ----------------------------------------------


};

// ----------------------------------------------


?>