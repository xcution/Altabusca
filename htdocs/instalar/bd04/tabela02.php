<?php




// comando para criar a tabela ------------------------------

$campos = null; // limpando campo antigo
$campos .= "id int not null auto_increment primary key, "; // campos da tabela
$campos .= "token_imagens text, "; // campos da tabela
$campos .= "conteudo_imagem text, "; // campos da tabela
$campos .= "destino_imagem text, "; // campos da tabela
$campos .= "data_publicou text"; // campos da tabela

// --------------------------------------------------------------------




// query ------------------------------------------------------------

$query = "create table $nome_prefixo_tabela_ajuda_imagens ($campos);"; // query

// --------------------------------------------------------------------




// criando tabelas ----------------------------------------------

$comando = comando_executa($query); // executa o comando

// ------------------------------------------------------------------




?>