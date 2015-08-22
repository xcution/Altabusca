<?php




// carrega bibliotecas ----------------------------------------

include("../../servidor/dados_do_servidor.php"); // dados do servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// ------------------------------------------------------------




// inicializa sessao ------------------------------------------

session_start(); // inicializa sessao

// ------------------------------------------------------------




// servidor de sessao -----------------------------------------

$servidor_sessao = $_SESSION['sessao_servidor_selecionado_indexar']; // servidor de sessao

// ------------------------------------------------------------




// conecta ao mysql ------------------------------------------

conecta_servidor_especifico($servidor_sessao); // conecta ao mysql

// ----------------------------------------------------------




// conecta ao banco de dados -------------------------------

conecta_banco_dados($nome_banco_novos_hosts); // conecta ao banco de dados

// ---------------------------------------------------------




// query ---------------------------------------------------

$query = "select *from $nome_prefixo_tabela_novo_host;"; // query

// ---------------------------------------------------------




// roda query ---------------------------------------------

$comando = comando_executa($query); // roda query

// --------------------------------------------------------




// numero de linhas ---------------------------------------

$numero_linhas = mysql_num_rows($comando); // numero de linhas

// --------------------------------------------------------




// contador ----------------------------------------------

$contador = 0; // contador

// --------------------------------------------------------




// array com novos hosts ----------------------------------

$array_hosts_novos = array(); // array com novos hosts

// --------------------------------------------------------




// obtendo dados da tabela --------------------------------

for($contador == $contador; $contador <= $numero_linhas; $contador++){




// dados da tabela ----------------------------------------

$dados_tabela = mysql_fetch_array($comando, MYSQL_ASSOC); // dados da tabela

// --------------------------------------------------------




// host de site -------------------------------------------

$host_site = $dados_tabela['host_site']; // host de site

// --------------------------------------------------------




// verifica se conteudo e valido --------------------------

if($host_site != null and retorne_elemento_array_existe($array_hosts_novos, $host_site) == false){




// atualizando array --------------------------------------

$array_hosts_novos[] = $host_site; // atualizando array

// --------------------------------------------------------




};

// -------------------------------------------------------




};

// -------------------------------------------------------




// conecta ao banco de dados -----------------------------

conecta_banco_dados($nome_banco_novos_sites_indexar); // conecta ao banco de dados

// -------------------------------------------------------




// atualiza banco de dados de indexacao ------------------

foreach($array_hosts_novos as $url_host_site){




// query ------------------------------------------------

$query_1 = "select *from $nome_prefixo_tabela_novo_host where host_site='$url_host_site';"; // query

$query_2 = "insert into $nome_prefixo_tabela_novo_host values('$url_host_site');"; // query

// ------------------------------------------------------




// comando ----------------------------------------------

$comando = comando_executa($query_1); // comando

// ------------------------------------------------------




// numero de linhas -------------------------------------

$numero_linhas = mysql_num_rows($comando); // numero de linhas

// ------------------------------------------------------




// roda query --------------------------------------------

if($numero_linhas == 0){


comando_executa($query_2); // roda query


};

// -------------------------------------------------------




};

// --------------------------------------------------------




// conecta ao banco de dados ------------------------------

conecta_banco_dados($nome_banco_novos_hosts); // conecta ao banco de dados

// --------------------------------------------------------




// query -------------------------------------------------

$query = "delete from $tabela_dados[0];"; // query

// -------------------------------------------------------




// roda query -------------------------------------------

$comando = comando_executa($query); // roda query

// ------------------------------------------------------




// desconecta do mysql ----------------------------------

desconecta_mysql(); // desconecta do mysql

// ------------------------------------------------------




?>