<?php

if ($_POST) {
  $data = [];
  
  try {
    
    if($_POST['login']) {
      if ($app['query']->checkLogin($_POST['login'])) {
        $data['login'] = $_POST['login'];
        $data['id'] = $app['query']->getId('login', $data['login']);
      } else {
        throw new Exception('Login not found');
      }
    } else {
      throw new Exception('No login');
    }
    
    if($_POST['password']) {
      if (!$app['query']->checkPass('login', $data['login'], $_POST['password'])) {
        throw new Exception('Wrong password');
      }
    } else {
      throw new Exception('No password');
    }
  
    $app['query']->addSession($data['id'], session_id());
    setcookie("id", $data['id'] );
    
    redirectTo('profile');
    
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}