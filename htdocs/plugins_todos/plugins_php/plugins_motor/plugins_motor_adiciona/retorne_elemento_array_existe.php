<?php


// retorna se o elemento do array ja esiste ou nao ------------

function retorne_elemento_array_existe($array_pesquisa, $valor_pesquisa){


// valida array -------------------------------------------

if(count($array_pesquisa) == 0){
	
return false; // retorna falso

};

// --------------------------------------------------------


// varrendo array e comparando valores ------------------------

foreach($array_pesquisa as $valor_array){


// comparando valor -------------------------------------------------

if($valor_array == $valor_pesquisa){

return true; // retorna verdadeiro

};

// ------------------------------------------------------------------------


};

// ------------------------------------------------------------------------


// retorna falso nesse nivel ----------------------------------------

return false; // retorna falso nesse nivel

// ------------------------------------------------------------------------


};

// --------------------------------------------------------------------------


?>