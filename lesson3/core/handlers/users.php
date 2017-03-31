<?php


if ($_POST) {
  
  $input = clearArray($_POST, [
      'id' => 'int',
  ]);
  
  try {
    
    if($_POST['id']) {
      $photo = User::returnPhoto($input['id']);
      $photoPath = $app['root'] . $app['imagepath'] . $photo;
      if ($photo) {
        unlink($photoPath);
      }
      User::where('id', $input['id'])->delete();
  
      if ($input['id'] == $app['id']) {
        Request::redirectTo('exit');
      } else {
        Request::redirectTo('users');
      }
    } else {
      throw new Exception('Invalid query');
    }
    
    
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}