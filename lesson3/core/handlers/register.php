<?php

if ($_POST) {
  $data = [];
  
  try {
    if ($app['query']->checkLogin($_POST['login'])) {
      throw new Exception('Login already in use');
    }
    
    if($_POST['login']) {
      $data['login'] = $_POST['login'];
    } else {
      throw new Exception('No login');
    }
    
    if($_POST['password']) {
      $data['salt'] = generateHash();
      $data['password'] = generateCrypt($_POST['password'], $data['salt']);
    } else {
      throw new Exception('No password');
    }
    
    $id = $app['query']->addUser($data);
    $app['query']->addSession($id, session_id());
    
    setcookie("id", $id );
    
  
    redirectTo('profile');
    
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}