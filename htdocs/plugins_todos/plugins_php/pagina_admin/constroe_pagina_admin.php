<?php


// constroe a pagina admin --------------------------------

function constroe_pagina_admin(){


// opcoes de administrador --------------------------------

$conteudo_pagina_admin .= "<div class='div_opcoes_administrador'>"; // opcoes
$conteudo_pagina_admin .= "<li>"; // opcoes
$conteudo_pagina_admin .= "<a href='cadlista/' title='Importar lista de sites'>Importar lista de sites</a>"; // opcoes
$conteudo_pagina_admin .= "<li>"; // opcoes
$conteudo_pagina_admin .= "<a href='gerencia_ajuda/' title='Gerenciar ajuda'>Gerenciar ajuda</a>"; // opcoes
$conteudo_pagina_admin .= "<li>"; // opcoes
$conteudo_pagina_admin .= "<a href='remove_host/' title='Remover hosts'>Remover hosts</a>"; // opcoes
$conteudo_pagina_admin .= "<li>"; // opcoes
$conteudo_pagina_admin .= "<a href='indexar/' title='Indexar sites'>Indexar sites</a>"; // opcoes
$conteudo_pagina_admin .= "</div>"; // opcoes

// --------------------------------------------------------


// codigo html bruto --------------------------------------

$codigo_html_bruto .= "<div class='div_titulo_campos_gerais'>"; // codigo html bruto
$codigo_html_bruto .= "Administrador"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= $conteudo_pagina_admin; // codigo html bruto

// --------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>