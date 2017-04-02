<?php


if ($_POST) {
  global $config;
  
  $input = clearArray($_POST, [
      'id' => 'int',
  ]);
  
  try {
    
    if($_POST['id']) {
      $photo =  User::returnPhoto($input['id']);
      unlink($config->root . $config->imagepath . $photo);
      User::deletePhoto($input['id']);
      Route::redirectTo('files');
    } else {
      throw new Exception('Invalid query');
    }
    
    
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}