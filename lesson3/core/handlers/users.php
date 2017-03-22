<?php


if ($_POST) {
  
  $input = clearArray($_POST, [
      'id' => 'int',
  ]);
  
  try {
    
    if($_POST['id']) {
      $photo = $app['query']->getField('photo', $input['id']);
      $photoPath = $app['root'] . $app['imagepath'] . $photo;
      if ($photo) {
        unlink($photoPath);
      }
      $app['query']->deleteUser($input['id']);
  
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