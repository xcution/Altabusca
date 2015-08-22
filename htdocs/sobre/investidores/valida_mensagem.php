<?php


// inicia a sessao ----------------------------------------

session_start(); // inicia a sessao

// --------------------------------------------------------


// numero de itens de post --------------------------------

$numero_itens_post = retorne_numero_itens_array_post(); // numero de itens de post

// --------------------------------------------------------


// dados de formulario ------------------------------------

$telefone = remove_html($_POST['telefone']); // telefone

$email = remove_html($_POST['email']); // email

$mensagem = remove_html($_POST['mensagem']); // mensagem

// --------------------------------------------------------


// informa se encontrou erro no formulario ----------------

$encontrou_erro_formulario = false; // informa se encontrou erro no formulario

$pode_enviar_mensagem = true; // pode enviar mensagem

// --------------------------------------------------------


// valida todos os campos -----------------------

if($telefone == null or $email == null or $mensagem == null){


// informa que nao pode enviar mensagem ---------

$pode_enviar_mensagem = false; // informa que nao pode enviar mensagem

// ----------------------------------------------


};

// ----------------------------------------------


// valida campos ------------------------------------------

if($numero_itens_post > 0){


// valida campo ---------------------------------

if($telefone == null){


// mensagem de erro -----------------------------

$mensagem_informacao .= "<li>Telefone não é válido."; // mensagem de erro

// ----------------------------------------------


// informa que encontrou erro -------------------

$encontrou_erro_formulario = true; // encontrou erro

// ----------------------------------------------


};

// ----------------------------------------------


// valida campo ---------------------------------

if($email == null){


// mensagem de erro -----------------------------

$mensagem_informacao .= "<li>E-mail não é válido."; // mensagem de erro

// ----------------------------------------------


// informa que encontrou erro -------------------

$encontrou_erro_formulario = true; // encontrou erro

// ----------------------------------------------


};

// ----------------------------------------------


// valida campo ---------------------------------

if($mensagem == null){


// mensagem de erro -----------------------------

$mensagem_informacao .= "<li>A mensagem não pode ficar em branco."; // mensagem de erro

// ----------------------------------------------


// informa que encontrou erro -------------------

$encontrou_erro_formulario = true; // encontrou erro

// ----------------------------------------------


};

// ----------------------------------------------


};

// --------------------------------------------------------


// adiciona div especial ------------------------

if($encontrou_erro_formulario == true){


// adiciona div especial ------------------------

$mensagem_informacao = div_especial_mensagem_sistema("Ops!", $mensagem_informacao); // adiciona div especial

// ----------------------------------------------


// mensagem de erro -----------------------------

$_SESSION['mensagem_erro'] = $mensagem_informacao; // mensagem de erro

// ----------------------------------------------


};

// ----------------------------------------------


// envia mensagem -------------------------------

if($pode_enviar_mensagem == true){


// mensagem de sucesso --------------------------

$mensagem_informacao = "Mensagem enviada com sucesso."; // mensagem de sucesso

// ----------------------------------------------


// adiciona div especial ------------------------

$mensagem_informacao = div_especial_sucesso("Contato enviado", $mensagem_informacao); // adiciona div especial

// ----------------------------------------------


// mensagem de sucesso --------------------------

$_SESSION['mensagem_erro'] = $mensagem_informacao; // mensagem de sucesso

// ----------------------------------------------


// envia mensagem -------------------------------

include("envia_mensagem.php"); // envia mensagem

// ----------------------------------------------


// recarrega index ------------------------------

header("Location: index.php"); // recarrega index

// ----------------------------------------------


};

// ----------------------------------------------


?>