<?php


// retorna parte de texto que contem a palavra chave no conteudo ------

function retorna_texto_contem_palavra_chave($conteudo_site, $termo_pesquisa){




// remove codigo html ---------------------------------------------------------------

$conteudo_site = remove_html($conteudo_site); // remove codigo html

// -------------------------------------------------------------------------------------------




// obtendo index de termo chave ------------------------------------------------

$index_inicio = strpos($conteudo_site, $termo_pesquisa); // obtendo index de termo chave

// ----------------------------------------------------------------------------------------




// index final --------------------------------------------------------------------------

$index_fim = 256; // index final

// ----------------------------------------------------------------------------------------




// obtendo subconteudo ------------------------------------------------------------

if($index_inicio != null){

$sub_conteudo = substr($conteudo_site, $index_inicio, $index_fim)."..."; // obtendo subconteudo

}else{

$sub_conteudo = null; // retorno nulo

};

// ----------------------------------------------------------------------------------------




// adiciona div --------------------------------------------------------------------

$sub_conteudo = "<div class='div_termo_pesquisa_encontrado'>$sub_conteudo</div>"; // adiciona div

// ----------------------------------------------------------------------------------------




// retorno ------------------------------------------------

return $sub_conteudo; // retorno

// ----------------------------------------------------------




};

// ----------------------------------------------------------------------------------------


?>