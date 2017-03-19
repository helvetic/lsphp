<?php

if ($_POST) {
  $data = [];
  
  $input = clearArray($_POST, [
      'login' => 'string',
      'password' => 'string',
  ]);
  
  try {
    if ($app['query']->checkLogin($input['login'])) {
      throw new Exception('Login already in use');
    }
    
    if($_POST['login']) {
      $data['login'] = $input['login'];
    } else {
      throw new Exception('No login');
    }
    
    if($_POST['password']) {
      $data['salt'] = generateHash();
      $data['password'] = generateCrypt($input['password'], $data['salt']);
    } else {
      throw new Exception('No password');
    }
    
    $id = $app['query']->addUser($data);
    $app['query']->addSession($id, session_id());
    
    setcookie("id", $id );
    
  
    Request::redirectTo('profile');
    
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}