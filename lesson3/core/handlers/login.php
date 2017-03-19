<?php

if ($_POST) {
  $data = [];
  
  $input = clearArray($_POST, [
      'login' => 'string',
      'password' => 'string',
  ]);
  
  try {
    
    if($_POST['login']) {
      if ($app['query']->checkLogin($input['login'])) {
        $data['login'] = $input['login'];
        $data['id'] = $app['query']->getId('login', $data['login']);
      } else {
        throw new Exception('Login not found');
      }
    } else {
      throw new Exception('No login');
    }
    
    if($_POST['password']) {
      if (!$app['query']->checkPass('login', $data['login'], $input['password'])) {
        throw new Exception('Wrong password');
      }
    } else {
      throw new Exception('No password');
    }
  
    $app['query']->addSession($data['id'], session_id());
    setcookie("id", $data['id'] );
    
    Request::redirectTo('profile');
    
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}