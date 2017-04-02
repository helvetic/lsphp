<?php

class ReCaptcha
{
  public $secret;
  
  public function __construct()
  {
    global $config;
    $this->secret = $config->gsecret;
  }
  
  public function check($response)
  {
    $data = "secret={$this->secret}&response={$response}";
  
    $ch = curl_init();
  
    curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $data);
  
    $json = json_decode(curl_exec($ch));
  
    curl_close($ch);
  
    return $json->success;
  }
  
}
