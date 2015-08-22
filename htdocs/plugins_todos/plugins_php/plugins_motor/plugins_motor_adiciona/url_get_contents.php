<?php


// obtem codigo html de site --------------------

function url_get_contents($url_site) {


// nova conexao curl_init -------------------------

$ch = curl_init(); // nova conexao curl_init

// ---------------------------------------------------------


// setando propriedades --------------------------

curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url_site);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);   

// ---------------------------------------------------------


// obtendo dados -----------------------------------

$data = curl_exec($ch); // obtendo dados 

// --------------------------------------------------------


// fecha conexao -----------------------------------

curl_close($ch); // fecha conexao

// -------------------------------------------------------


// retorna dados -----------------------------------

return $data; // retorna dados

// ------------------------------------------------------


};

// ------------------------------------------------------


?>