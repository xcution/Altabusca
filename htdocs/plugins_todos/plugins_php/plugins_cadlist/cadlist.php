<?php


// cadastra lista txt com sites -------------------

function cadlist($endereco_arquivo){


// lista de retorno ------------------------------------

$lista_retorno = null; // lista de retorno

// ---------------------------------------------------------


// numero de sites adicionados -----------------

$numero_adicionados = 0; // numero de sites adicionados

// ---------------------------------------------------------


// cadastra novo site para ser indexado ------

$handle = @fopen($endereco_arquivo, "r"); // ponteiro para arquivo

if ($handle) { // se o arquivo existir

while (!feof($handle)) { // se o arquivo for valido

$buffer = fgets($handle, 4096); // obtendo linha de arquivo

$buffer = trim($buffer); // remove espacos em branco

cadastra_novo_host_indexar($buffer); // cadastra

$lista_retorno .= $buffer."<br>"; // atualiza lista de retorno

$numero_adicionados++; // atualiza numero de adicionados

};

fclose($handle); // fecha arquivo

};

// --------------------------------------------------------


// informa quantos foram adicionados -------

$lista_retorno = "<font size='6px'>Adicionados: $numero_adicionados sites</font> <br><br>". $lista_retorno; // informa quantos foram adicionados

// --------------------------------------------------------


// retorna lista ---------------------------------------

return $lista_retorno; // retorna lista

// --------------------------------------------------------


};

// --------------------------------------------------------


?>