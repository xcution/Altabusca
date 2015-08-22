<?php


// converte data numero para amigavel ---------

function converte_data_amigavel($data){


// verifica se a data e valida ------------------------

if($data == null){

return null; // retorno nulo

};

// ---------------------------------------------------------


// obtendo dados de array de data ---------------

$data_explode = explode("-", $data); // data

// ---------------------------------------------------------


// obtem a abreviacao do mes --------------------

$time = mktime(0, 0, 0, $data_explode[1]); // time

$nome_mes = strftime("%b", $time); // nome abreviado do mes

// ---------------------------------------------------------


// numero do dia da data ---------------------------

$numero_dia = $data_explode[0]; // numero do dia da data

// ---------------------------------------------------------


// obtendo dados de data --------------------------

$mes = $nome_mes; // mes
$dia = $data_explode[0]; // dia
$ano = $data_explode[2]; // ano
$dia_semana = date('w', mktime(0,0,0, $data_explode[1], $data_explode[0], $data_explode[2])); // data completa

// --------------------------------------------------------


// semana ---------------------------------------------

$semana = array(
'0' => 'Domingo', 
'1' => 'Segunda-Feira',
'2' => 'Terça-Feira',
'3' => 'Quarta-Feira',
'4' => 'Quinta-Feira',
'5' => 'Sexta-Feira',
'6' => 'Sábado'
);

// --------------------------------------------------------


// mes --------------------------------------------------

$mes_extenso = array(
'Jan' => 'Janeiro',
'Feb' => 'Fevereiro',
'Mar' => 'Marco',
'Apr' => 'Abril',
'May' => 'Maio',
'Jun' => 'Junho',
'Jul' => 'Julho',
'Aug' => 'Agosto',
'Nov' => 'Novembro',
'Sep' => 'Setembro',
'Oct' => 'Outubro',
'Dec' => 'Dezembro'
);

// --------------------------------------------------------


// data completa -------------------------------------

$data_completa = $semana[$dia_semana].", {$dia} de ".$mes_extenso[$mes]." de 20{$ano}";

// --------------------------------------------------------


// retorno ----------------------------------------------

return $data_completa; // retorno
	
// --------------------------------------------------------


};

// --------------------------------------------------------


?>