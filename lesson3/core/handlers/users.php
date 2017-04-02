<?php


if ($_POST) {
  global $config;
  
  $input = clearArray($_POST, [
      'id' => 'int',
  ]);
  
  try {
    
    if($_POST['id']) {
      $photo = User::returnPhoto($input['id']);
      $photoPath = $config->root . $config->imagepath . $photo;
      if ($photo) {
        unlink($photoPath);
      }
      User::where('id', $input['id'])->delete();
  
      if ($input['id'] == $app['id']) {
        Route::redirectTo('exit');
      } else {
        Route::redirectTo('users');
      }
    } else {
      throw new Exception('Invalid query');
    }
    
    
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}