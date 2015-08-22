<?php


// carrega informacoes de servidor online ------------------------------

function carrega_informacoes_servidor_online($servidor){




// globals ----------------------------------------------------------------------

global $imagem_servidor_basico; // imagens de servidor

global $nome_banco; // nome do banco de dados

global $numero_maximo_registros_busca_inteligente; // numero maximo de registros permitidos

// --------------------------------------------------------------------------------




// numero de registros atual ----------------------------------

$numero_registros = retorne_numero_registros_banco_dados($nome_banco); // numero de registros atual

// --------------------------------------------------------------------




// calculando porcentagem ----------------------------------

$porcentagem = ($numero_registros * 100) / $numero_maximo_registros_busca_inteligente; // calcula porcentagem

$porcentagem = round($porcentagem, 2); // arredonda

// --------------------------------------------------------------------




// informacoes de retorno ------------------------------------

$informacoes_retorno .= div_porcentagem_hd($porcentagem); // informacoes de retorno

// --------------------------------------------------------------------




// retorno ----------------------------------------------------------

return $informacoes_retorno; // retorno

// --------------------------------------------------------------------




};

// --------------------------------------------------------------------------------


?>