<?php


// busca host por termos de pesquisa ----------------------------

function buscar_host($nome_conexao){


// globals ------------------------------------------------------------------

global $numero_maximo_resultados_pagina_busca_inteligente; // numero maximo de resultados por pagina

global $resultados_busca_termos; // resultados de busca inteligente

// ----------------------------------------------------------------------------




// termo de pesquisa -------------------------------------------------

$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa

// ----------------------------------------------------------------------------




// modo de pesquisa --------------------------------------------------

$modo_pesquisa = retorne_modo_pesquisa(); // modo de pesquisa

// ----------------------------------------------------------------------------




// tipo de busca ---------------------------------------------------------

$busca_exata = retorne_busca_exata(); // tipo de busca

// ----------------------------------------------------------------------------




// valida termo de pesquisa -----------------------------------------

if($termo_pesquisa == null){

return null; // valida termo de pesquisa

};

// ----------------------------------------------------------------------------




// codifica para utf-8 --------------------------------------------------

$termo_pesquisa = utf8_decodificar($termo_pesquisa); // codifica para utf-8

// ----------------------------------------------------------------------------




// dados de array de retorno --------------------------------------

$dados_array_retorno = array(); // dados de array de retorno

// ----------------------------------------------------------------------------




// query --------------------------------------------------------------------

$query = retorna_query_pesquisa($termo_pesquisa); // query

// ----------------------------------------------------------------------------




// comando --------------------------------------------------------------

$comando = comando_executa($query[0], $nome_conexao); // comando

// ----------------------------------------------------------------------------




// numero de linhas ----------------------------------------------------

$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas

// ----------------------------------------------------------------------------




// dados de pacote -----------------------------------------------------

$dados_pacote = monta_pacote_retorno_busca($comando); // dados de pacote

// ----------------------------------------------------------------------------




// numero de resultados validos -----------------------------------

$numero_resultados_validos = retorne_numero_linhas_query($query[1]); // numero de resultados validos

// ----------------------------------------------------------------------------




// lista dados de pacote ----------------------------------------------

foreach($dados_pacote as $conteudo_pacote){




// valida conteudo de pacote ---------------------------------------

if($conteudo_pacote != null){

$lista_resultados_retorno .= $conteudo_pacote; // atualizando

};

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------




// verifica o tipo de busca atual exata ou nao ------------------

if($busca_exata == 1){


$informacao_sobre_pesquisa_imagem .= "<br>"; // informacao sobre pesquisa de imagem
$informacao_sobre_pesquisa_imagem .= "Para otimizar a pesquisa de imagens, "; // informacao sobre pesquisa de imagem
$informacao_sobre_pesquisa_imagem .= "apenas links de imagens que contenham <b>$termo_pesquisa</b> serão exibidas!"; // informacao sobre pesquisa de imagem
$informacao_sobre_pesquisa_imagem .= "<br>"; // informacao sobre pesquisa de imagem
$informacao_sobre_pesquisa_imagem .= "<br>"; // informacao sobre pesquisa de imagem
$informacao_sobre_pesquisa_imagem .= "<a href='index.php?termo_pesquisa=$termo_pesquisa&modo_pesquisa=$modo_pesquisa&pagina_numero=0&busca_exata=0' class='btn btn-primary btn-xs'><b>busca aproximada</b></a>"; // informacao sobre pesquisa de imagem


}else{


$informacao_sobre_pesquisa_imagem .= "<br>"; // informacao sobre pesquisa de imagem
$informacao_sobre_pesquisa_imagem .= "<br>"; // informacao sobre pesquisa de imagem
$informacao_sobre_pesquisa_imagem .= "<a href='index.php?termo_pesquisa=$termo_pesquisa&modo_pesquisa=$modo_pesquisa&pagina_numero=0&busca_exata=1' class='btn btn-success btn-xs'><b>Busca exata!</b></a>"; // informacao sobre pesquisa de imagem


};

// ------------------------------------------------------------------------------




// div com resultados organizados --------------------------------

$div_com_resultados_organizados .= "<div class='div_com_resultados_organizados'>"; // div com resultados organizados
$div_com_resultados_organizados .= $lista_resultados_retorno; // div com resultados organizados
$div_com_resultados_organizados .= "</div>"; // div com resultados organizados

// ----------------------------------------------------------------------------




// div com resultados organizados --------------------------------

$div_com_resultados_organizados .= "<div class='div_com_resultados_organizados'>"; // div com resultados organizados
$div_com_resultados_organizados .= "<br>"; // div com resultados organizados
$div_com_resultados_organizados .= criar_tags_busca_inteligente(); // div com resultados organizados
$div_com_resultados_organizados .= proximas_paginas_busca_inteligente($numero_resultados_validos); // div com resultados organizados
$div_com_resultados_organizados .= "</div>"; // div com resultados organizados

// -----------------------------------------------------------------------------




// adiciona resultados ja organizados ----------------------------

$lista_resultados_retorno = $div_com_resultados_organizados; // adiciona resultados ja organizados

// ------------------------------------------------------------------------------




// atualiza resultado final --------------------------------------------

$resultados_busca_termos .= $lista_resultados_retorno ; // atualizando

// ----------------------------------------------------------------------------




// div com resultados organizados --------------------------------

$div_com_resultados_organizados = null; // div com resultados organizados
$div_com_resultados_organizados .= "<div class='div_com_resultados_organizados'>"; // div com resultados organizados
$div_com_resultados_organizados .= "<div class='div_numero_resultados_busca_inteligente'>"; // div com resultados organizados
$div_com_resultados_organizados .= "Encontrados aproximadamente"; // div com resultados organizados
$div_com_resultados_organizados .= "&nbsp;"; // div com resultados organizados
$div_com_resultados_organizados .= "("; // div com resultados organizados
$div_com_resultados_organizados .= $numero_resultados_validos; // div com resultados organizados
$div_com_resultados_organizados .= ")"; // div com resultados organizados
$div_com_resultados_organizados .= "&nbsp;"; // div com resultados organizados
$div_com_resultados_organizados .= "sites contendo <b>$termo_pesquisa</b>."; // div com resultados organizados
$div_com_resultados_organizados .= $informacao_sobre_pesquisa_imagem; // div com resultados organizados
$div_com_resultados_organizados .= "</div>"; // div com resultados organizados
$div_com_resultados_organizados .= "</div>"; // div com resultados organizados

// ----------------------------------------------------------------------------




// atualiza resultado final --------------------------------------------

$resultados_busca_termos = $div_com_resultados_organizados.$resultados_busca_termos; // atualiza resultado final

// ---------------------------------------------------------------------




};

// ----------------------------------------------------------------------------


?>