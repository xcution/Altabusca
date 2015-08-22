<?php


// retorna a query de pesquisa --------------------------------------

function retorna_query_pesquisa($termo_pesquisa){




// globals ------------------------------------------------------------------

global $tamanho_limite_busca_inteligente_query; // este e o tamanho limite na busca query, isto evita uma busca desnecessaria em todo o banco de dados

$pagina_numero = pagina_atual_get(); // numero da pagina atual

// ------------------------------------------------------------------------------




// tabela ---------------------------------------------------------------------

$tabela = retorne_tabela_salvar_site(); // tabela

// ------------------------------------------------------------------------------




// pega pagina atual ----------------------------------------------------

$pagina_atual = $pagina_numero; // pega pagina atual

// ------------------------------------------------------------------------------




// verifica se pagina atual e valida ----------------------------------

if($pagina_atual == null or is_numeric($pagina_atual) == false or $pagina_atual < 0){




// zera contadores de pagina ------------------------------------------

$pagina_atual = 0; // zera contadores de pagina

$pagina_numero = 0; // zera contadores de pagina

// ------------------------------------------------------------------------------




};

// ------------------------------------------------------------------------------




// calculando limite de query ------------------------------------------

$query_limite_inicio = $pagina_numero * $tamanho_limite_busca_inteligente_query; // inicio de query

$query_limite_fim = $tamanho_limite_busca_inteligente_query; // fim de query

// ------------------------------------------------------------------------------




// condicao de limite ------------------------------------------------------

$condicao_limite = "LIMIT $query_limite_inicio, $query_limite_fim"; // condicao de limite

// ------------------------------------------------------------------------------




// array com termos de pesquisa ------------------------------------

$array_termos_pesquisa = retorne_array_termos_pesquisa($termo_pesquisa); // array com termos de pesquisa

// ------------------------------------------------------------------------------




// numero de termos de pesquisa ----------------------------------

$numero_termos_pesquisa = count($array_termos_pesquisa); // numero de termos de pesquisa

// ------------------------------------------------------------------------------




// contador de termos de pesquisa --------------------------------

$contador_termos_pesquisa = 1; // contador de termos de pesquisa

// ------------------------------------------------------------------------------




// campos de pesquisa geral -----------------------------------------

if(retorne_modo_pesquisa() == 1){


// links ------------------------------------------------------------------------

$campos_tabela_pesquisar[0] .= "host_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or url_pagina like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or titulo_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or keywords_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or description_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or links_internos_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or links_externos_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or conteudo_site like '%$termo_pesquisa%' "; // campos de pesquisa

// ------------------------------------------------------------------------------


}else{


// imagens ------------------------------------------------------------------

$campos_tabela_pesquisar[0] .= "host_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or url_pagina like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or titulo_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or keywords_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or description_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or imagens_site_geral like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or conteudo_site like '%$termo_pesquisa%' "; // campos de pesquisa

// ------------------------------------------------------------------------------


};

// ------------------------------------------------------------------------------




// campos de pesquisa geral -----------------------------------------

if(retorne_modo_pesquisa() == 1){


// links ------------------------------------------------------------------------

$campos_tabela_pesquisar[1] .= "links_internos_site like '%$termo_pesquisa%' "; // campos de pesquisa

// ------------------------------------------------------------------------------


}else{


// imagens ------------------------------------------------------------------

$campos_tabela_pesquisar[1] .= "imagens_site_geral like '%$termo_pesquisa%' "; // campos de pesquisa

// ------------------------------------------------------------------------------


};

// ------------------------------------------------------------------------------




// campos de pesquisa ------------------------------------------------

if($numero_termos_pesquisa == 1){




// campos de pesquisa ------------------------------------------------

if(retorne_busca_exata() == 1){


// links ------------------------------------------------------------------------

$campos_pesquisa = $campos_tabela_pesquisar[1]; // exata

// ------------------------------------------------------------------------------


}else{


// imagens ------------------------------------------------------------------

$campos_pesquisa = $campos_tabela_pesquisar[0]; // todos

// ------------------------------------------------------------------------------


};

// ------------------------------------------------------------------------------




}else{




// obtendo termos de pesquisa de array --------------------------

foreach($array_termos_pesquisa as $termo_pesquisa_array){




// verifica se termo pesquisa possui conteudo ------------------

if($termo_pesquisa_array != null){




// campos de pesquisa ------------------------------------------------

if(retorne_busca_exata() == 1){




// modo de pesquisa ---------------------------------------------------

if(retorne_modo_pesquisa() == 1){


// link --------------------------------------------------

if($contador_termos_pesquisa == 1){




// atualiza contador -------------------------------

$contador_termos_pesquisa++; // atualiza contador

// -------------------------------------------------------




// campos de pesquisa --------------------------

$campos_pesquisa = " links_internos_site like '%$termo_pesquisa_array%' "; // campos de pesquisa

// -------------------------------------------------------




}else{




// campos de pesquisa --------------------------

$campos_pesquisa .= "or links_internos_site like '%$termo_pesquisa_array%' "; // campos de pesquisa

// -------------------------------------------------------




};

// --------------------------------------------------------




}else{




// imagem --------------------------------------------

if($contador_termos_pesquisa == 1){




// atualiza contador -------------------------------

$contador_termos_pesquisa++; // atualiza contador

// --------------------------------------------------------




// campos de pesquisa --------------------------

$campos_pesquisa = " imagens_site_geral like '%$termo_pesquisa_array%' "; // campos de pesquisa

// --------------------------------------------------------




}else{




// campos de pesquisa --------------------------

$campos_pesquisa .= "or imagens_site_geral like '%$termo_pesquisa_array%' "; // campos de pesquisa

// --------------------------------------------------------




};

// --------------------------------------------------------




};

// --------------------------------------------------------




}else{




// modo de pesquisa ---------------------------------------------------

if(retorne_modo_pesquisa() == 1){




// aplica une tabelas ------------------------------

if($contador_termos_pesquisa == 1){


// atualiza contador -------------------------------

$contador_termos_pesquisa++; // atualiza contador

// -------------------------------------------------------


// codigo unir tabelas ----------------------------

$une_tabelas = "or "; // codigo unir tabelas

// -------------------------------------------------------


}else{


// codigo unir tabelas ----------------------------

$une_tabelas = null; // codigo unir tabelas

// -------------------------------------------------------


};

// --------------------------------------------------------




// campos de pesquisa --------------------------

$campos_pesquisa .= "host_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or url_pagina like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or titulo_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or keywords_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or description_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or links_internos_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or links_externos_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or conteudo_site like '%$termo_pesquisa_array%' $une_tabelas"; // campos de pesquisa

// -------------------------------------------------------




}else{




// aplica une tabelas ------------------------------

if($contador_termos_pesquisa == 1){


// atualiza contador -------------------------------

$contador_termos_pesquisa++; // atualiza contador

// -------------------------------------------------------


// codigo unir tabelas ----------------------------

$une_tabelas = "or "; // codigo unir tabelas

// -------------------------------------------------------


}else{


// codigo unir tabelas ----------------------------

$une_tabelas = null; // codigo unir tabelas

// -------------------------------------------------------


};

// --------------------------------------------------------




// campos de pesquisa --------------------------

$campos_pesquisa .= "host_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or url_pagina like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or titulo_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or keywords_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or description_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or imagens_site_geral like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or conteudo_site like '%$termo_pesquisa_array%' $une_tabelas"; // campos de pesquisa

// --------------------------------------------------------




};

// --------------------------------------------------------




};

// ------------------------------------------------------------------------------




};

// ------------------------------------------------------------------------------




};

// ------------------------------------------------------------------------------




};

// ------------------------------------------------------------------------------




// querys de retorno -----------------------------------------------------

$querys_retorno[0] = "select *from $tabela where $campos_pesquisa $condicao_limite;"; // limite
$querys_retorno[1] = "select *from $tabela where $campos_pesquisa;"; // completa

// ------------------------------------------------------------------------------




// retorno -------------------------------------------------------------------

return $querys_retorno; // retorno

// ------------------------------------------------------------------------------




};

// --------------------------------------------------------------------------


?>