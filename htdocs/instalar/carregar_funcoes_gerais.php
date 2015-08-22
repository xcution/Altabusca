<?php




// carrega o logotipo ------------------------------------------------------------------------------------------------

include("../logotipo/logotipo.php"); // logotipo

// ------------------------------------------------------------------------------------------------------------------




// carrega e lista todas as funcoes ----------------------------------------------------------------------------------

$endereco_de_pasta_funcoes = "../funcoes/"; // endereço de pasta de funcoes

$arquivos = glob("$endereco_de_pasta_funcoes{*.php}", GLOB_BRACE); // listando somente arquivos

// ------------------------------------------------------------------------------------------------------------------




// quanditade de arquivos encontrados --------------------------------------------------------------------------------

$contador = 0; // contador

$quantidade_de_arquivos = count($arquivos); // quantidade de arquivos php encontrados

// ------------------------------------------------------------------------------------------------------------------




// listando ----------------------------------------------------------------------------------------------------------

for($contador == $contador; $contador <= $quantidade_de_arquivos; $contador++){




// endereço de codigo php --------------------------------------------------------------------------------------------

$endereco_de_arquivo = $arquivos[$contador]; // endereço de arquivo php

$endereco_de_arquivo = "$endereco_de_arquivo"; // transforma em texto

// ------------------------------------------------------------------------------------------------------------------




// incluindo codigo php ----------------------------------------------------------------------------------------------

if($endereco_de_arquivo != "index.php" and $endereco_de_arquivo != null){


$lista_com_bibliotecas_php .= "include('".$endereco_de_arquivo."');\n"; // obtendo endereço de arquivo

include($endereco_de_arquivo); // auto-include


};

// ------------------------------------------------------------------------------------------------------------------




};

// ------------------------------------------------------------------------------------------------------------------




?>
