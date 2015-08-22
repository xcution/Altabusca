<?php




// carrega bibliotecas ----------------------------------------

include("../../servidor/dados_do_servidor.php"); // dados do servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// ------------------------------------------------------------------


// altera o banco de dados de busca inteligente ---

//somente se for necessario, recebe dados de $_POST

altera_banco_dados_busca_inteligente(); // altera o banco de dados de busca inteligente

// ------------------------------------------------------------------




// iniciando sessao ------------------------------------------

session_start(); // iniciando sessao

// ------------------------------------------------------------------




// contador de avanco ----------------------------------------

if($_SESSION['sessao_contador_avanco_indexar'] != null){


$contador_avanco = $_SESSION['sessao_contador_avanco_indexar']; // contador de avanco


}else{


$contador_avanco = 0; // contador de avanco


};

// ------------------------------------------------------------------




// dados de formulario ----------------------------------------

$servidor = $_POST['servidor']; // servidor

// ------------------------------------------------------------------




// conecta ao mysql ------------------------------------------

conecta_servidor_especifico($servidor); // conecta ao mysql

// ------------------------------------------------------------------




// conecta ao banco de dados ------------------------------

conecta_banco_dados($nome_banco_novos_sites_indexar); // conecta ao banco de dados

// ------------------------------------------------------------------




// query ----------------------------------------------------------

$query = "select *from $nome_prefixo_tabela_novo_host LIMIT $contador_avanco, 1;"; // query

// ------------------------------------------------------------------




// roda query --------------------------------------------------

$comando = comando_executa($query); // roda query

// ------------------------------------------------------------------




// numero de linhas ------------------------------------------

$numero_linhas = retorna_numero_novos_hosts_indexar($conexao_mysql_conectar); // numero de linhas

// ------------------------------------------------------------------




// informa se o banco de dados ja atintiu o limite ----

$banco_dados_atingiu_limite_resposta = false; // informa se o banco de dados ja atintiu o limite

// ----------------------------------------------------------------




// dados da tabela ------------------------------------------

$dados_tabela = mysql_fetch_array($comando, MYSQL_ASSOC); // dados da tabela

// ----------------------------------------------------------------




// host de site ------------------------------------------------

$host_site = $dados_tabela['host_site']; // host de site

// ----------------------------------------------------------------




// verifica se conteudo e valido --------------------------

if($banco_dados_atingiu_limite_resposta == false){




// indexando site --------------------------------------------

adicionar_novo_host($host_site); // indexando site

// ----------------------------------------------------------------




// porcentagem ----------------------------------------------

$porcentagem = ($contador_avanco * 100) / $numero_linhas - 1; // porcentagem

// ----------------------------------------------------------------




// sessao de indexacao ------------------------------------

if($contador_avanco <= $numero_linhas){


$_SESSION['sessao_porcentagem_indexa'] = $porcentagem; // sessao de indexacao


};

// ----------------------------------------------------------------




// sessao de indexacao ------------------------------------

$_SESSION['sessao_host_indexa_atual'] = $host_site; // sessao de indexacao

// ----------------------------------------------------------------




// contador de avanco --------------------------------------

$_SESSION['sessao_contador_avanco_indexar'] += 1; // contador de avanco

// ----------------------------------------------------------------




};

// ----------------------------------------------------------------




// verifica se ja atingiu o limite de dados ----------------

if($contador_avanco > $numero_linhas){


$_SESSION['sessao_processamento_concluido'] = true; // processamento concluido


}else{


$_SESSION['sessao_processamento_concluido'] = false; // processamento continua


};

// ----------------------------------------------------------------




// desconecta do mysql ------------------------------------

desconecta_mysql(); // desconecta do mysql

// ----------------------------------------------------------------




?>