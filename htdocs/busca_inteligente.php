<?php




// conecta aos banco de dados de servidores disponiveis ------------

conecta_servidores_inteligentes(); // conecta aos banco de dados de servidores disponiveis

// ------------------------------------------------------------------------------------




// resultados de busca inteligente ------------------------------------------

$resultados_busca_termos = null; // resultados de busca inteligente

// --------------------------------------------------------------------------------------




// buscando dados em servidores ------------------------------------------

foreach($conexao_busca_inteligente  as $nome_conexao){




// resultados de busca ----------------------------------------------------------

buscar_host($nome_conexao); // resultados

// --------------------------------------------------------------------------------------




};

// --------------------------------------------------------------------------------------




?>