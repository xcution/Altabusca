<?php




// retorna todos os arquivos de uma pasta --------------------------

function retorna_arquivos_pasta($endereco_pasta, $extencao){




// diretorio e lista de arquivos -----------------------------------------

$pasta_diretorio = new RecursiveDirectoryIterator($endereco_pasta); // pasta de arquivos

$lista_arquivos = new RecursiveIteratorIterator($pasta_diretorio); // lista de arquivos

// ----------------------------------------------------------------------------




// array com lista de arquivos -----------------------------------------

$arquivos_encontrados = array(); // array com lista de arquivos

// ----------------------------------------------------------------------------




// listando arquivos ------------------------------------------------------

foreach ($lista_arquivos as $informacao_arquivo) {




// extencao de arquivo ---------------------------------------------------

$extencao_arquivo = ".".pathinfo($informacao_arquivo, PATHINFO_EXTENSION); // extencao de arquivo

// ------------------------------------------------------------------------------




// atualiza lista de retorno ----------------------------------------------

if($extencao == $extencao_arquivo or $extencao == null){


$arquivos_encontrados[] = $informacao_arquivo->getPathname(); // atualiza lista de retorno


};

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------




// retorno ------------------------------------------------------------------

return $arquivos_encontrados; // retorno

// ----------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------




?>