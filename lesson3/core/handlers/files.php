<?php


if ($_POST) {
  global $config;
  
  $input = clearArray($_POST, [
      'id' => 'int',
  ]);
  
  $is_valid = GUMP::is_valid($_POST, [
      'id' => 'required|integer'
  ]);
  
  try {
    
    if($is_valid !== true) {
      throw new Exception($is_valid[0]);
    }
    
    $photo =  User::returnPhoto($input['id']);
    unlink($config->root . $config->imagepath . $photo);
    User::deletePhoto($input['id']);
    Route::redirectTo('files');
    
    
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}