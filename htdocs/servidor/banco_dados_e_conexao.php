<?php




// nome geral prefixo banco de dados ----------------------------

$nome_prefixo_geral_banco_dados = "altabusca_banco"; // nome geral prefixo banco de dados

// --------------------------------------------------------------




// array com nomes de banco de dados -------------------------

$banco_dados_nomes_array[0] = $nome_prefixo_geral_banco_dados."produtos"; // array com nomes de banco de dados
$banco_dados_nomes_array[1] = $nome_prefixo_geral_banco_dados."hosts"; // array com nomes de banco de dados
$banco_dados_nomes_array[2] = $nome_prefixo_geral_banco_dados."indexar"; // array com nomes de banco de dados
$banco_dados_nomes_array[3] = $nome_prefixo_geral_banco_dados."ajuda"; // array com nomes de banco de dados
$banco_dados_nomes_array[4] = $nome_prefixo_geral_banco_dados."jogos"; // array com nomes de banco de dados
$banco_dados_nomes_array[5] = $nome_prefixo_geral_banco_dados."aplicativos"; // array com nomes de banco de dados
$banco_dados_nomes_array[6] = $nome_prefixo_geral_banco_dados."noticias"; // array com nomes de banco de dados
$banco_dados_nomes_array[7] = $nome_prefixo_geral_banco_dados."soperacionais"; // array com nomes de banco de dados
$banco_dados_nomes_array[8] = $nome_prefixo_geral_banco_dados."backup_hosts"; // array com nomes de banco de dados

// ----------------------------------------------------------------------------




// dados do mysql do servidor -------------------------------------

$url_do_servidor = "http://".$_SERVER['SERVER_NAME']."/"; // url do servidor

$servidor_mysql_conectar = "localhost"; // servidor

$usuario_mysql_conectar = "root"; // usuario

$senha_mysql_conectar = ""; // senha

$conexao_mysql_conectar = null; // variavel de conexao

$prefixo_banco_de_dados = $banco_dados_nomes_array[0]; // prefixo do banco de dados

// ----------------------------------------------------------------------------




?>