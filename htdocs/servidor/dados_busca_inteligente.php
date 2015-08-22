<?php




// dados do motor de busca e adicao inteligente --------------------------------------

$separador_dados_tabela = "(_".md5("#")."_)"; // separador de dados na tabela

$nome_prefixo_banco_dados_busca = $banco_dados_nomes_array[0]; // nome prefixo do banco de dados

$nome_prefixo_banco_dados_busca_novos_hosts = $banco_dados_nomes_array[1]; // nome prefixo do banco de dados

$nome_prefixo_banco_dados_busca_indexar = $banco_dados_nomes_array[2]; // nome de prefixo de banco de dados com sites a serem indexados

$nome_prefixo_banco_dados_ajuda = $banco_dados_nomes_array[3]; // nome do prefixo do banco de dados de ajuda

$tamanho_limite_busca_inteligente_query = 10; // este e o tamanho limite na busca query, isto evita uma busca desnecessaria em todo o banco de dados

// ------------------------------------------------------------------------------------------------------




// nome de banco de dados ----------------------------------------------------------------

$nome_banco = $nome_prefixo_banco_dados_busca; // nome do banco de dados

$nome_banco_novos_hosts = $nome_prefixo_banco_dados_busca_novos_hosts; // nome do banco de dados de novos hosts

$nome_banco_novos_sites_indexar = $nome_prefixo_banco_dados_busca_indexar; // nome do banco de dados com novos sites a serem indexados

// ----------------------------------------------------------------------------------------------------




?>