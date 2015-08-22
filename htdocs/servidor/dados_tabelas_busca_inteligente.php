<?php




// letra_nome_tabelas para tabelas --------------------------------

$tabela_dados[0] = "tabela_hosts"; // nome de tabela

// ------------------------------------------------------------------------------




// dados de tabelas -----------------------------------------------------

$nome_prefixo_tabela = "tabela_"; // nome prefixo de tabela

$nome_prefixo_tabela_novo_host = $tabela_dados[0]; // nome de prefixo de tabela

$nome_prefixo_tabela_ajuda = $nome_prefixo_tabela."ajuda"; // nome prefixo de tabela de ajuda

$nome_prefixo_tabela_ajuda_imagens = $nome_prefixo_tabela."ajuda_imagens"; // prefixo de nome de tabela de imagens de ajuda

// ------------------------------------------------------------------------------




// comando para criar a tabela --------------------------------------

$campos_tabela_pesquisa_geral .= "idhost_site int not null auto_increment primary key, "; // campos_tabela_pesquisa_geral da tabela
$campos_tabela_pesquisa_geral .= "url_pagina text, "; // campos_tabela_pesquisa_geral da tabela
$campos_tabela_pesquisa_geral .= "host_site text, "; // campos_tabela_pesquisa_geral da tabela
$campos_tabela_pesquisa_geral .= "titulo_site text, "; // campos_tabela_pesquisa_geral da tabela
$campos_tabela_pesquisa_geral .= "keywords_site text, "; // campos_tabela_pesquisa_geral da tabela
$campos_tabela_pesquisa_geral .= "description_site text, "; // campos_tabela_pesquisa_geral da tabela
$campos_tabela_pesquisa_geral .= "links_internos_site text, "; // campos_tabela_pesquisa_geral da tabela
$campos_tabela_pesquisa_geral .= "links_externos_site text, "; // campos_tabela_pesquisa_geral da tabela
$campos_tabela_pesquisa_geral .= "imagens_site_geral text, "; // campos_tabela_pesquisa_geral da tabela
$campos_tabela_pesquisa_geral .= "conteudo_site text, "; // campos_tabela_pesquisa_geral da tabela
$campos_tabela_pesquisa_geral .= "data_atualizacao_site text"; // campos_tabela_pesquisa_geral da tabela

// -------------------------------------------------------------------------------




?>