<?php


// seleciona banco de dados ---------------------

conecta_banco_dados($banco_dados_nomes_array[8]); // seleciona banco de dados

// ----------------------------------------------


// querys ---------------------------------------

$query[0] = "select *from $tabela_dados[0] where host_site='$endereco_site';"; // query

$query[1] = "insert into $tabela_dados[0] values(null, '$endereco_site', '$tipo_site');"; // query

// ----------------------------------------------


// salva no banco de dados ----------------------

if(retorne_numero_linhas_query($query[0]) == 0){


// salva novo site ------------------------------

comando_executa($query[1]); // salva em banco de dados

// ----------------------------------------------


}else{


// informacao -----------------------------------

$site_informacao = "O site $endereco_site já foi adicionado anteriormente."; // informacao

// ----------------------------------------------


// adiciona div especial ------------------------

$site_informacao = div_especial_mensagem_sistema("Ops!", $site_informacao); // adiciona div especial

// ----------------------------------------------


// site de erro -----------------------------

$_SESSION['site_erro_adicionar_mensagem'] = $site_informacao; // site de erro

// ----------------------------------------------


};

// ----------------------------------------------


?>