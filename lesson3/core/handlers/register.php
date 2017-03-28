<?php

if ($_POST) {
  $data = [];
  
  $input = clearArray($_POST, [
      'login' => 'string',
      'email' => 'email',
      'password' => 'string',
  ]);
  
  try {
    if ($app['query']->checkLogin($input['login'])) {
      throw new Exception('Login already in use');
    }
    
    if ($_POST['login']) {
      $data['login'] = $input['login'];
    } else {
      throw new Exception('No login');
    }
    
    if ($_POST['email']) {
      if ($input['email']) {
        $data['email'] = $input['email'];
      } else {
        throw new Exception('Wrong email address');
      }
    } else {
      throw new Exception('No email');
    }
    
    if ($_POST['password']) {
      $data['salt'] = generateHash();
      $data['password'] = generateCrypt($input['password'], $data['salt']);
    } else {
      throw new Exception('No password');
    }
    
    $id = $app['query']->addUser($data);
    $app['query']->addSession($id, session_id());
    
    setcookie("id", $id );
  
    new MailTo([
        'email' => $data['email'],
        'subject' => 'Registration success',
        'body' => "<h1>You have successfully signed up as {$input['login']}</h1>
                   <p>Your password: {$input['password']}</p>"
    ]);
  
    Request::redirectTo('profile');
    
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}