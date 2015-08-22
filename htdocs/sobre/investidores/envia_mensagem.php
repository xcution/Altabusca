<?php


// data atual -----------------------------------

$data_mensagem = data_atual(); // data atual

$data_mensagem = converte_data_amigavel($data_mensagem); // data atual amigavel

// ----------------------------------------------


// corpo da mensagem ----------------------------

$corpo_mensagem = "E-mail: $email \n Telefone: $telefone \n Mensagem: $mensagem \n\n Data: $data_mensagem \n"; // corpo da mensagem

// ----------------------------------------------


// envia a mensagem ---------------------------------------

enviar_email($email_contato_investimento, "Contato de investimento", $corpo_mensagem); // envia a mensagem

// ----------------------------------------------


?>