<?php


// constroe formulario de upload ---------------

function constroe_formulario_upload($url_script_upload, $multiplos_uploads, $id_campo_upload, $campos_formulario){

// ---------------------------------------------------------

// 1° url de upload
// 2° permite selecionar varios arquivos para upload
// 3° id de campo de upload

// ---------------------------------------------------------


// valida multiplos uploads -----------------------

if($multiplos_uploads == true){

$campo_file .= "<br>"; // campo file
$campo_file .= "<input type='file' name='arquivo_upload' id='$id_campo_upload' multiple>"; // campo file
$campo_file .= "<br>"; // campo file
$campo_file .= "<br>"; // campo file

}else{

$campo_file .= "<br>"; // campo file
$campo_file .= "<input type='file' name='arquivo_upload' id='$id_campo_upload'>"; // campo file
$campo_file .= "<br>"; // campo file
$campo_file .= "<br>"; // campo file

};

// --------------------------------------------------------


// codigo html bruto -------------------------------

$codigo_html_bruto .= "<div class='classe_formulario_upload'>"; // codigo html bruto
$codigo_html_bruto .= "<form action='$url_script_upload' method='post' enctype='multipart/form-data'>"; // codigo html bruto
$codigo_html_bruto .= $campos_formulario; // codigo html bruto
$codigo_html_bruto .= $campo_file; // codigo html bruto
$codigo_html_bruto .= "<input type='submit' class='btn btn-primary btn-xs' value='Enviar'>"; // codigo html bruto
$codigo_html_bruto .= "</form>"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto

// --------------------------------------------------------


// retorno ----------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>