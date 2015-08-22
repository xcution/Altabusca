<?php


// upload de arquivo -------------------------------

function upload_arquivo($destino_arquivo, $extensao_array){


// adiciona barra -------------------------------------

if(substr($destino_arquivo, strlen($destino_arquivo) - 1) != "/"){

$destino_arquivo .= "/"; // adiciona barra

};

// ---------------------------------------------------------


// obtendo valores ----------------------------------

$nome_temp = $_FILES['arquivo_upload']['tmp_name']; // nome temporario do arquivo

$nome_original = $_FILES['arquivo_upload']['name']; // nome original

$tamanho_arquivo = $_FILES['arquivo_upload']['size']; // tamanho de arquivo

$extensao_arquivo = ".".strtolower(pathinfo($nome_original, PATHINFO_EXTENSION)); // extensao

$novo_nome = md5(data_atual().$nome_original).$extensao_arquivo; // novo nome do arquivo

$endereco_upload = $destino_arquivo.$novo_nome; // endereco final de arquivo de upload

// --------------------------------------------------------


// valida tamanho de arquivo -------------------

if($tamanho_arquivo == 0 or $nome_original == null){

return null; // retorno nulo

};

// --------------------------------------------------------


// pode continuar upload ------------------------

$pode_continuar = false; // pode continuar upload

// --------------------------------------------------------


// valida extensao de arquivo -------------------

foreach($extensao_array as $extensao){


// converte para minusculo ----------------------

$extensao = strtolower($extensao); // converte para minusculo

// ---------------------------------------------------------


// valida extensao arquivo ------------------------

if($extensao != null and $extensao == $extensao_arquivo){

$pode_continuar = true; // pode continuar upload

};

// ---------------------------------------------------------

};

// ---------------------------------------------------------


// verifica se pode continuar upload ----------

if($pode_continuar == true){


// movendo arquivo para servidor ------------

move_uploaded_file($nome_temp, $endereco_upload); // movendo arquivo para servidor

// --------------------------------------------------------


// valida upload de arquivo ----------------------

if(file_exists($endereco_upload) == true){

return $endereco_upload; // retorna endereco de arquivo

}else{

return null; // retorno nulo

};

// --------------------------------------------------------


}else{


// retorno nulo ---------------------------------------

return null; // retorno nulo

// --------------------------------------------------------


};

// --------------------------------------------------------


};

// --------------------------------------------------------


?>