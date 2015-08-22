<?php




// porta de conexao com servidor ----------------------------------------------

$porta_padrao_conexao_servidor_inteligente = 80; // porta de comunicacao

// ------------------------------------------------------------------------------------------




// conexoes abertas em busca inteligente ------------------------------------

$conexao_busca_inteligente; // conexoes abertas em busca inteligente

// ------------------------------------------------------------------------------------------




// contador de servidor --------------------------------------------------------------

$contador_servidor = 0; // contador de servidor

// ------------------------------------------------------------------------------------------




// servidores de busca inteligente ------------------------------------------------

// array com enderecos de servidores web tipo 10.0.0.3 etc...

$servidor_busca_inteligente[1] = $servidor_mysql_conectar; // servidor
$servidor_busca_inteligente[2] = null; // servidor

// ------------------------------------------------------------------------------------------




// 1 servidor web ----------------------------------------------------------------------

$contador_servidor++; // contador de servidor
$banco_servidor_busca_inteligente[$contador_servidor][0] = $nome_prefixo_banco_dados_busca."1"; // banco de dados e servidor
$banco_servidor_busca_inteligente[$contador_servidor][1] = $servidor_busca_inteligente[$contador_servidor]; // banco de dados e servidor

// ------------------------------------------------------------------------------------------




// 2 servidor web ----------------------------------------------------------------------

$contador_servidor++; // contador de servidor
$banco_servidor_busca_inteligente[$contador_servidor][0] = $nome_prefixo_banco_dados_busca."1"; // banco de dados e servidor
$banco_servidor_busca_inteligente[$contador_servidor][1] = $servidor_busca_inteligente[$contador_servidor]; // banco de dados e servidor

// ------------------------------------------------------------------------------------------




?>