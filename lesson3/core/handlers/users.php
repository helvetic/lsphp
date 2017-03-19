<?php


if ($_POST) {
  
  try {
    
    if($_POST['id']) {
      $photo = $app['query']->getField('photo', $_POST['id']);
      unlink($app['root'] . $app['imagepath'] . $photo);
      $app['query']->deleteUser($_POST['id']);
      Request::redirectTo('users');
    } else {
      throw new Exception('Invalid query');
    }
    
    
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}