<?php


// exclui arquivo unico --------------------------------

function exclui_arquivo_unico($endereco_arquivo){


// remove arquivo se nao for nulo ------------------

if($endereco_arquivo != null){

unlink($endereco_arquivo); // removendo arquivo

};

// ----------------------------------------------------------


};

// ----------------------------------------------------------


?>