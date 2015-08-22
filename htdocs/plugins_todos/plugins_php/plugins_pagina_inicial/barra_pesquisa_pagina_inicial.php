<?php


// barra de pesquisa de pagina inicial ----------------------------------

function barra_pesquisa_pagina_inicial(){




// globals ------------------------------------------------------------------------

global $nome_do_sistema; // nome do sistema

$modo_pesquisa = retorne_modo_pesquisa(); // modo de pesquisa

global $opcoes_busca_site; // opcoes de busca

global $imagem_de_logotipo_meio; // imagem de logotipo do meio

global $endereco_url_site_global; // enderecos urls

// ------------------------------------------------------------------------------------


// link adicionar site ------------------------------------

$link_adicionar_site = "<a href='$endereco_url_site_global[7]' title='Seu site aqui'>Seu site aqui</a>"; // link adicionar site

// --------------------------------------------------------


// termo de pesquisa -------------------------------------------------

$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa

// ----------------------------------------------------------------------------




// informa o tipo de pesquisa atual --------------------------------------

switch($modo_pesquisa){


case 1:
$pesquisa_selecionada[$modo_pesquisa] = "selected"; // modo de pesquisa
break;


case 2:
$pesquisa_selecionada[$modo_pesquisa] = "selected"; // modo de pesquisa
break;


case 3:
$pesquisa_selecionada[$modo_pesquisa] = "selected"; // modo de pesquisa
break;


};

// ------------------------------------------------------------------------------------




// select de modo de pesquisa ------------------------------------------

$select_modo_pesquisa .= "<select class='modo_pesquisa' name='modo_pesquisa'>"; // select de modo de pesquisa
$select_modo_pesquisa .= "<option value='1' $pesquisa_selecionada[1]>$opcoes_busca_site[1]</option>"; // select de modo de pesquisa
$select_modo_pesquisa .= "<option value='2' $pesquisa_selecionada[2]>$opcoes_busca_site[2]</option>"; // select de modo de pesquisa
$select_modo_pesquisa .= "<option value='3' $pesquisa_selecionada[3]>$opcoes_busca_site[3]</option>"; // select de modo de pesquisa
$select_modo_pesquisa .= "</select>"; // select de modo de pesquisa

// ------------------------------------------------------------------------------------




// barra de pesquisa ----------------------------------------------------------

$barra_pesquisa .= "<div id='div_pesquisa_pagina_inicial'>"; // barra de pesquisa
$barra_pesquisa .= "<form action='index.php' method='get'>"; // barra de pesquisa
$barra_pesquisa .= $imagem_de_logotipo_meio; // barra de pesquisa
$barra_pesquisa .= "<br>"; // barra de pesquisa
$barra_pesquisa .= "<input type='text' name='termo_pesquisa' id='barra_pesquisa_pagina_inicial' value='$termo_pesquisa' placeholder='Tablet, celular, computador' class='form-control'>"; // barra de pesquisa
$barra_pesquisa .= "<br>"; // barra de pesquisa
$barra_pesquisa .= "<input type='submit' class='btn btn-primary' value='Pesquisar'>"; // barra de pesquisa
$barra_pesquisa .= "&nbsp;"; // barra de pesquisa
$barra_pesquisa .= "&nbsp;"; // barra de pesquisa
$barra_pesquisa .= "<input type='button' class='btn btn-default' value='Limpar' onclick='limpar_caixa_busca_pesquisa();'>"; // barra de pesquisa
$barra_pesquisa .= "&nbsp;"; // barra de pesquisa
$barra_pesquisa .= "&nbsp;"; // barra de pesquisa
$barra_pesquisa .= $select_modo_pesquisa; // barra de pesquisa
$barra_pesquisa .= campo_select_muda_tipo_busca(); // barra de pesquisa
$barra_pesquisa .= "&nbsp;"; // barra de pesquisa
$barra_pesquisa .= "&nbsp;"; // barra de pesquisa
$barra_pesquisa .= $link_adicionar_site; // barra de pesquisa
$barra_pesquisa .= "<input type='hidden' value='0' name='pagina_numero'>"; // barra de pesquisa
$barra_pesquisa .= "<input type='hidden' value='1' name='busca_exata'>"; // barra de pesquisa
$barra_pesquisa .= "</form>"; // barra de pesquisa
$barra_pesquisa .= "</div>"; // barra de pesquisa

// ----------------------------------------------------------------------------------




// retorno ------------------------------------------------------------------------

return $barra_pesquisa; // retorno

// ----------------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------------


?>