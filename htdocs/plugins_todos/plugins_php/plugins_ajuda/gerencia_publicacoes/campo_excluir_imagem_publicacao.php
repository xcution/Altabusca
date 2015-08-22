<?php


// campo exclui imagem de publicacao ----------------------

function campo_excluir_imagem_publicacao($id, $id_topico){


// codigo html bruto --------------------------------------

$codigo_html_bruto .= "<form action='excluir_imagem_post.php' method='post'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='id_post' value='$id'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='id_topico' value='$id_topico'>"; // codigo html bruto
$codigo_html_bruto .= "Excluir esta imagem"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<input type='checkbox' name='chk_confirma_exclusao' value='1'>"; // codigo html bruto
$codigo_html_bruto .= "&nbsp;"; // codigo html bruto
$codigo_html_bruto .= "Confirmar exclusão"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<input type='submit' class='btn btn-danger' value='Excluir imagem'>"; // codigo html bruto
$codigo_html_bruto .= "</form>"; // codigo html bruto

// --------------------------------------------------------


// adiciona div especial ----------------------------------

$codigo_html_bruto = div_especial_mensagem_sistema("Excluir imagem", $codigo_html_bruto); // adiciona div especial

// --------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>