<?php


// carrega bibliotecas ----------------------------------------

include("../../servidor/dados_do_servidor.php"); // dados do servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// ------------------------------------------------------------


// numero do banco de dados -------------------------------

$numero_banco = retorna_numero_banco_dados_nome(mudar_banco_dados(null)); // numero do banco de dados

// ------------------------------------------------------


// valida numero de banco de dados ------------------------

if($numero_banco == null){


// mensagem -----------------------------------------------

echo "Ops! selecione um banco de dados por favor."; // mensagem

// --------------------------------------------------------


// saindo do script ---------------------------------------

die; // saindo do script

// --------------------------------------------------------


};

// --------------------------------------------------------


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

conecta_banco_dados($banco_dados_nomes_array[8]); // conecta ao banco de dados

// ---------------------------------------------------------


// query ---------------------------------------------------

$query = "select *from $tabela_dados[0] where tipo_host='$numero_banco';"; // query

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

conecta_banco_dados($banco_dados_nomes_array[2]); // conecta ao banco de dados

// -------------------------------------------------------


// atualiza banco de dados de indexacao ------------------

foreach($array_hosts_novos as $url_host_site){


// query ------------------------------------------------

$query_1 = "select *from $tabela_dados[0] where host_site='$url_host_site';"; // query

$query_2 = "insert into $tabela_dados[0] values('$url_host_site');"; // query

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


// desconecta do mysql ----------------------------------

desconecta_mysql(); // desconecta do mysql

// ------------------------------------------------------


// mensagem de retorno ------------------------------------

echo "Backup restaurado com sucesso."; // mensagem de retorno

// --------------------------------------------------------


?>