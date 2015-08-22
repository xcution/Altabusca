<?php


// retorna as urls de hosts diferentes ---------

function func_retorne_urls_hosts_direfentes($endereco_url){


// obtem dados de url -----------------------------

$dados_url_principal = parse_url($endereco_url); // obtem dados de url

// --------------------------------------------------------



// host de url principal ----------------------------

$host_url_principal = $dados_url_principal['host']; // host de url principal

// --------------------------------------------------------


// codigo html ---------------------------------------

$html = file_get_contents($endereco_url); // codigo html

// --------------------------------------------------------


// cria documento html ---------------------------

$dom = new DOMDocument; // cria documento html

// --------------------------------------------------------


// obtem elementos html ------------------------

@$dom->loadHTML($html); // obtem elementos html

// --------------------------------------------------------


// obtendo links -------------------------------------

$links = $dom->getElementsByTagName('a'); // obtendo links

// --------------------------------------------------------


// array com resultados --------------------------

$array_resultados = array(); // array com resultados 

// --------------------------------------------------------


// extraindo urls -------------------------------------

foreach ($links as $link){


// url ----------------------------------------------------

$url = $link->getAttribute('href'); // url...

// --------------------------------------------------------


// valida url -------------------------------------------

if($url != null){

$array_resultados[] = $url; // atualiza array...

};

// --------------------------------------------------------


};

// --------------------------------------------------------


// remove duplicatas ------------------------------

$array_resultados = array_unique($array_resultados); // remove duplicatas

// --------------------------------------------------------


// array de retorno ---------------------------------

$array_retorno = array(); // array de retorno

// --------------------------------------------------------


// obtendo urls validas ----------------------------

foreach($array_resultados as $url){


// valida url --------------------------------------------

if($url != null){


// obtem dados de url -----------------------------

$dados = parse_url($url); // obtem dados de url

// --------------------------------------------------------


// host de url -----------------------------------------

$host_url = $dados['host']; //host de url

// --------------------------------------------------------


// atualiza array de retorno ---------------------

if($host_url != $host_url_principal){

$array_retorno[] = $url; // atualiza retorno...

};

// --------------------------------------------------------


};

// --------------------------------------------------------


};

// --------------------------------------------------------


// retorno ----------------------------------------------

return $array_retorno; // retorno

// --------------------------------------------------------


};


// --------------------------------------------------------


?>