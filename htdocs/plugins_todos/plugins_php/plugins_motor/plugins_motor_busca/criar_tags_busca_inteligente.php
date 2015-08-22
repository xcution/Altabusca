<?php


// cria as tags da busca inteligente --------------------------------

function criar_tags_busca_inteligente(){




// globals ------------------------------------------------------------------

$modo_pesquisa = retorne_modo_pesquisa(); // modo de pesquisa

global $nome_do_sistema; // nome do sistema

// ----------------------------------------------------------------------------




// termo de pesquisa --------------------------------------------------

$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa

// ----------------------------------------------------------------------------




// array com termos de pesquisa ----------------------------------

$array_termos_pesquisa = retorne_array_termos_pesquisa($termo_pesquisa); // array com termos de pesquisa

// ----------------------------------------------------------------------------



$lista_retorno_tags = null; // links de retorno com tags de pesquisa




// obtendo termos de pesquisa de array ------------------------

foreach($array_termos_pesquisa as $termo_pesquisa_array){




// url de pesquisa ------------------------------------------------------

$url_termo_pesquisa = "index.php?termo_pesquisa=$termo_pesquisa_array&modo_pesquisa=$modo_pesquisa&busca_exata=1"; // url com termo de pesquisa

// ----------------------------------------------------------------------------




// atualiza lista de retorno --------------------------------------------

if(strlen($termo_pesquisa_array) > 3){

$lista_retorno_tags .= "<a href='$url_termo_pesquisa' title='$termo_pesquisa_array' class='btn btn-primary btn-xs'>$termo_pesquisa_array</a>"; // atualizando lista
$lista_retorno_tags .= "&nbsp;"; // atualizando lista

};

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------




// div de retorno --------------------------------------------------------

$div_retorno .= ""; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= "<div class='div_sugestoes_pesquisa_inteligente'>"; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= "<font size='5'>"; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= "Sugestões de pesquisa do $nome_do_sistema"; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= "</font>"; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= "<br>"; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= "Se você não encontrou o que queria, clique numa das sugestões abaixo."; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= "<br>"; // div de retorno
$div_retorno .= "<br>"; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= $lista_retorno_tags; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= "</div>"; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= ""; // div de retorno

// ----------------------------------------------------------------------------




// retorno ------------------------------------------------------------------

return $div_retorno; // retorno

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------


?>