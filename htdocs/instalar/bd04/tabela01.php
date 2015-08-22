<?php




// comando para criar a tabela ------------------------------

$campos = null; // limpando campo antigo
$campos .= "id int not null auto_increment primary key, "; // campos da tabela
$campos .= "titulo_post text, "; // campos da tabela
$campos .= "conteudo_post text, "; // campos da tabela
$campos .= "token_imagens text, "; // campos da tabela
$campos .= "numero_imagens text, "; // campos da tabela
$campos .= "data_publicou text"; // campos da tabela

// --------------------------------------------------------------------




// query ------------------------------------------------------------

$query = "create table $nome_prefixo_tabela_ajuda ($campos);"; // query

// --------------------------------------------------------------------




// criando tabelas ----------------------------------------------

$comando = comando_executa($query); // executa o comando

// ------------------------------------------------------------------




?>