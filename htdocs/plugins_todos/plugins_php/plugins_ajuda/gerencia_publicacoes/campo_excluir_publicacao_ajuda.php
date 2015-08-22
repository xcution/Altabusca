<?php


// campo excluir publicacao de ajuda ----------------------

function campo_excluir_publicacao_ajuda($id, $token_imagens){


// codigo html bruto --------------------------------------

$codigo_html_bruto .= "<form action='excluir_publicacao.php' method='post'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='checkbox' name='chk_confirma_exclusao' value='1'>"; // codigo html bruto
$codigo_html_bruto .= "&nbsp;"; // codigo html bruto
$codigo_html_bruto .= "Confirmar exclusão"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<input type='submit' value='Excluir publicação' class='btn btn-danger'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='id_post' value='$id'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='token_imagens' value='$token_imagens'>"; // codigo html bruto
$codigo_html_bruto .= "</form>"; // codigo html bruto

// --------------------------------------------------------


// adiciona mensagem de sistema ---------------------------

$codigo_html_bruto = div_especial_mensagem_sistema("Excluir tópico", $codigo_html_bruto); // adiciona mensagem de sistema

// --------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>