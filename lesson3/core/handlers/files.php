<?php


if ($_POST) {
  
  $input = clearArray($_POST, [
      'id' => 'int',
  ]);
  
  try {
    
    if($_POST['id']) {
      $photo =  User::returnPhoto($input['id']);
      unlink($app['root'] . $app['imagepath'] . $photo);
      User::deletePhoto($input['id']);
      Request::redirectTo('files');
    } else {
      throw new Exception('Invalid query');
    }
    
    
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}