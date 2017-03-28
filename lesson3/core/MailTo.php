<?php

class MailTo
{
  public function __construct($data)
  {
    $yaLogin = 'lsphp@yandex.ru';
    
    $mail = new PHPMailer;
  
    $mail->isSMTP();
    $mail->Host = 'smtp.yandex.ru';
    $mail->SMTPAuth = true;
    $mail->Username = $yaLogin;
    $mail->Password = 'pRop051';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom($yaLogin, 'PHPLS');
    $mail->addAddress($data['email'], 'John Doe');
  
    $mail->isHTML(true);
  
    $mail->Subject = $data['subject'];
    $mail->Body    = $data['body'];
  
    if(!$mail->send()) {
      throw new Exception('Message could not be sent.' . $mail->ErrorInfo);
    }
  }
  
}