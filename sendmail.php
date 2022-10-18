<?php
  $body = "";
  $to = "contact@onlineplayonline.com";

  $subject = "Title of letter";

  if (trim(!empty($_POST['name']))){
      $body.='<p><strong>name:</strong> '.$_POST['name'].'</p>';
  }
  if (trim(!empty($_POST['email']))){
      $body.='<p><strong>email:</strong> '.$_POST['email'].'</p>';
  }
  if (trim(!empty($_POST['comment']))){
      $body.='<p><strong>comment:</strong> '.$_POST['comment'].'</p>';
  }
  
  $message = "
    <html>
    <head>
      <title>$subject</title>
    </head>
    <body>
      $body 
    </body>
    </html>
    ";
  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-type: text/html; charset=utf-8';
  $headers[] = 'From: contact@onlineplayonline.com';

  if(!mail($to, $subject, $message, implode("\r\n", $headers))){
      $message = "Error";
  } else{
      $message = 'Submitted!';
  }

  $response = ['message' => $message];

  header('Content-type: application/json');
  echo json_encode($response);
?>