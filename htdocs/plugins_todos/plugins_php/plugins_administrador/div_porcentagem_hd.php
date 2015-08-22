<?php


// porcentagem hd ----------------------------------

function div_porcentagem_hd($porcentagem){


// globals ----------------------------------------------

global $imagem_servidor_basico; // imagens de servidor

// --------------------------------------------------------




// div retorno ------------------------------------------

$div_retorno .= ""; // div retorno
$div_retorno .= "<div class='classe_div_painel_administrador_acao'>"; // div retorno
$div_retorno .= ""; // div retorno
$div_retorno .= $imagem_servidor_basico[2]; // div retorno
$div_retorno .= ""; // div retorno
$div_retorno .= "&nbsp;"; // div retorno
$div_retorno .= ""; // div retorno
$div_retorno .= "<progress max='100' value='$porcentagem'></progress>"; // div retorno
$div_retorno .= ""; // div retorno
$div_retorno .= "&nbsp;"; // div retorno
$div_retorno .= ""; // div retorno
$div_retorno .= $porcentagem; // div retorno
$div_retorno .= ""; // div retorno
$div_retorno .= "%"; // div retorno
$div_retorno .= ""; // div retorno
$div_retorno .= "</div>"; // div retorno
$div_retorno .= ""; // div retorno

// --------------------------------------------------------




// retorno ----------------------------------------------

return $div_retorno; // retorno

// --------------------------------------------------------




};

// ------------------------------------------------------


?>