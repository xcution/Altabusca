<?php


// carrega o logotipo --------------------------------------------------

include("../logotipo/logotipo.php"); // logotipo

// ----------------------------------------------------------------------------


// carrega e lista todas as funcoes --------------------------------

$arquivos = retorna_arquivos_pasta($pasta_plugins_php, ".php"); // listando somente arquivos

// ----------------------------------------------------------------------------


// quanditade de arquivos encontrados -------------------------

$contador = 0; // contador

$quantidade_de_arquivos = count($arquivos); // quantidade de arquivos php encontrados

// ----------------------------------------------------------------------------


// listando ----------------------------------------------------------------

for($contador == $contador; $contador <= $quantidade_de_arquivos; $contador++){


// endereço de codigo php -----------------------------------------

$endereco_de_arquivo = $arquivos[$contador]; // endereço de arquivo php

$endereco_de_arquivo = $endereco_de_arquivo; // transforma em texto

// ---------------------------------------------------------------------------


// incluindo codigo php ----------------------------------------------

if($endereco_de_arquivo != "index.php" and $endereco_de_arquivo != null){


// conteudo de script php -------------------------------------------

$conteudo_script_php .= file_get_contents($endereco_de_arquivo); // conteudo de script php

// ----------------------------------------------------------------------------


};

// ----------------------------------------------------------------------------


};

// ----------------------------------------------------------------------------


// remove marcadores php ------------------------------------------

$conteudo_script_php = str_replace("<?php", null, $conteudo_script_php); // inicio

$conteudo_script_php = str_replace("?>", null, $conteudo_script_php); // fim

// ----------------------------------------------------------------------------


// atualiza codigo fonte final -----------------------------------------

$codigo_fonte_scripts_php_todos .= $conteudo_script_php; // atualiza codigo fonte final

// -----------------------------------------------------------------------------


// limpando variaveis ---------------------------------------------------

$conteudo_script_php = null; // limpando conteudo antigo de conteudo de scripts php

// -----------------------------------------------------------------------------


?>
