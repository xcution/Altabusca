<?php


// retorna se a busca e exata ou nao ---------

function retorne_busca_exata(){


// busca exata ----------------------------------------

$busca_exata = remove_html($_GET['busca_exata']); // busca exata

// --------------------------------------------------------


// valida busca exata ------------------------------

if($busca_exata == null or is_numeric($busca_exata) == false){

$busca_exata = 1; // busca exata padrao

};

// ---------------------------------------------------------


// retorno ----------------------------------------------

return $busca_exata; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>