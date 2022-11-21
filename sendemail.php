<?php

$to = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
//$to = 'herbert.rufino@gmail.com';
$subject = 'Confirmação de cadastro';
$from = 'herbert.rufino@gmail.com';
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<p><a href="http://www.google.com">Clique aqui</a> para validar sua conta</p>';
$message .= '</body></html>';
 
// Sending email
$sucesso = mail($to, $subject, $message, $headers);
if ($sucesso){
  echo 'Email enviado com sucesso!';
}else{
  echo 'Atenção, o email não foi enviado!';
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Serviço Fácil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>  
  </head>
  <body>
    <div class="container mt-5">
      <?php
      if($sucesso) { ?>
        <h3>Você está cadastrado no Serviço Fácil!</h3>
        <p>Para validar a sua conta, você deve acessar o seu e-mail e clicar no link fornecido.</p>
      <?php }else{ ?>
        <h3>Você não está cadastrado no Serviço Fácil!</h3>
        <p>Houve algum erro no envio do email.</p>
        <?php } ?>
      <a href="index.php">Voltar</a>
  </body>
</html>