<?php


if ($_POST) {
  $data = [];
  
  $input = clearArray($_POST, [
      'login' => 'string',
      'password' => 'string',
  ]);
  
  try {
    
    if($_POST['login']) {
      $user = User::checkLogin($input['login']);
      if ($user !== NULL) {
        $data['login'] = $input['login'];
        $data['id'] = $user->id;
      } else {
        throw new Exception('Login not found');
      }
    } else {
      throw new Exception('No login');
    }
    
    if($_POST['password']) {
      if (!User::checkPass('login', $data['login'], $input['password'])) {
        throw new Exception('Wrong password');
      }
    } else {
      throw new Exception('No password');
    }
  
  
    $captcha = new ReCaptcha();
    
    if (!$captcha->check($_POST['g-recaptcha-response'])) {
      throw new Exception('Captcha check failed');
    }
  
    Session::add($data['id'], session_id());
    setcookie("id", $data['id'] );
    
    Request::redirectTo('profile');
    
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}