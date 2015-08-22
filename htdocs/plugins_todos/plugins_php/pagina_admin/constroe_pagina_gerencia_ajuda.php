<?php


// constroe a pagina gerencia ajuda -----------------------

function constroe_pagina_gerencia_ajuda(){


// opcoes de administrador --------------------------------

$conteudo_pagina_admin .= "<div class='div_opcoes_administrador'>"; // opcoes
$conteudo_pagina_admin .= "<li>"; // opcoes
$conteudo_pagina_admin .= "<a href='publica_ajuda/' title='Publicar ajuda'>Publicar ajuda</a>"; // opcoes
$conteudo_pagina_admin .= "<li>"; // opcoes
$conteudo_pagina_admin .= "<a href='gerencia_publicacoes/' title='Gerenciar publicações'>Gerenciar publicações</a>"; // opcoes
$conteudo_pagina_admin .= "</div>"; // opcoes

// --------------------------------------------------------


// codigo html bruto --------------------------------------

$codigo_html_bruto .= "<div class='div_titulo_campos_gerais'>"; // codigo html bruto
$codigo_html_bruto .= "Gerenciar ajuda"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= $conteudo_pagina_admin; // codigo html bruto

// --------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>