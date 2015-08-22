<?php


// formulario pesquisa ajuda ------------------------------

function formulario_pesquisa_ajuda(){
	

// termo de pesquisa --------------------------------------

$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa

// --------------------------------------------------------


// codigo html bruto --------------------------------------

$codigo_html_bruto .= "<div class='div_formulario_pesquisa_ajuda'>"; // codigo html bruto
$codigo_html_bruto .= "<div class='div_titulo_campos_gerais'>"; // codigo html bruto
$codigo_html_bruto .= "Pesquisar ajuda"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= "<form action='index.php' method='get'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='text' value='$termo_pesquisa' class='form-control' placeholder='Pesquisar ajuda' name='termo_pesquisa'>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<input type='submit' class='btn btn-primary btn-xs' value='Buscar'>"; // codigo html bruto
$codigo_html_bruto .= "</form>"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto

// --------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>