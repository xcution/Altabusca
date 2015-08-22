<?php




// carrega bibliotecas ----------------------------------------

include("../../servidor/dados_do_servidor.php"); // dados do servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// ------------------------------------------------------------------




// dados de formulario --------------------------------------

$site_endereco = $_POST['site_endereco']; // endereco de site

$site_endereco_comparar = $_POST['site_endereco']; // endereco de site

// ------------------------------------------------------------------




// remove protocolo se existir ------------------------------

$site_endereco = str_replace("http://", null, $site_endereco); // remove protocolo se existir

// ------------------------------------------------------------------




// adiciona protocolo ------------------------------------------

if($site_endereco != null){

$site_endereco = "http://".$site_endereco; // adiciona protocolo

};

// ------------------------------------------------------------------



// iniciando sessao ------------------------------------------

session_start(); // iniciando sessao

// ------------------------------------------------------------------




// obtendo de sessao o servidor de index --------------

$servidor = $_SESSION['sessao_servidor_selecionado_indexar']; // obtendo servidor

// ------------------------------------------------------------------




// verifica se o servidor foi informado --------------------

if($servidor == null){




// mensagem --------------------------------------------------

echo "Servidor não informado!"; // mensagem

// ------------------------------------------------------------------




// saindo --------------------------------------------------------

die; // saindo

// ------------------------------------------------------------------




};

// ------------------------------------------------------------------




// conecta ao mysql ------------------------------------------

conecta_servidor_especifico($servidor); // conecta ao mysql

// ------------------------------------------------------------------




// conecta ao banco de dados ------------------------------

conecta_banco_dados($nome_banco_novos_sites_indexar); // conecta ao banco de dados

// ------------------------------------------------------------------




// query ----------------------------------------------------------

$query = "insert into $nome_prefixo_tabela_novo_host values('$site_endereco');"; // query

// ------------------------------------------------------------------




// numero de linhas ------------------------------------------

$numero_linhas = retorna_numero_novos_hosts_indexar($conexao_mysql_conectar); // numero de linhas

// ------------------------------------------------------------------




// verifica se o numero de linhas e maior que o permitido ----------

if($numero_linhas > retorne_tamanho_pode_indexar_site()){


echo "A tabela tem hosts demais, escolha outro servidor!";

die; // saindo


};

// --------------------------------------------------------------------------------




// resposta se o host esta cadastrado ----------------------------------

$host_cadastrado_resposta = retorne_host_tabela_indexar_existe($site_endereco); // resposta se o host esta cadastrado

// --------------------------------------------------------------------------------




// executa comando para salvar ----------------------------

if($site_endereco_comparar != null and $host_cadastrado_resposta == false){




// roda query --------------------------------------------------

$comando = comando_executa($query); // roda query

// ------------------------------------------------------------------




// mensagem --------------------------------------------------

echo "Host cadastrado com sucesso!"; // mensagem

// ------------------------------------------------------------------




}else{




// mensagem --------------------------------------------------

echo "O host informado não pode ser cadastrado."; // mensagem

// ------------------------------------------------------------------




};

// ------------------------------------------------------------------




// desconecta do mysql ------------------------------------

desconecta_mysql(); // desconecta do mysql

// ----------------------------------------------------------------




?>