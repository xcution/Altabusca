<?php


// campo select muda tipo de busca modo cadastro ----------

function campo_select_muda_tipo_busca_cadastro(){


// monta campo select -------------------------------------

$campo_select .= "<select name='tipo_site' class='modo_pesquisa'>"; // campo select
$campo_select .= "<option value='1'>Produtos</option>"; // campo select
$campo_select .= "<option value='2'>Jogos</option>"; // campo select
$campo_select .= "<option value='3'>Aplicativos</option>"; // campo select
$campo_select .= "<option value='4'>Notícias</option>"; // campo select
$campo_select .= "<option value='5'>Sistemas operacionais</option>"; // campo select
$campo_select .= "</select>"; // campo select

// --------------------------------------------------------


// retorno --------------------------------------------

return $campo_select; // retorno

// -------------------------------------------------------


};

// -------------------------------------------------------


?>