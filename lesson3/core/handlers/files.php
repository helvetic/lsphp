<?php


if ($_POST) {
  
  $input = clearArray($_POST, [
      'id' => 'int',
  ]);
  
  try {
    
    if($_POST['id']) {
      $photo = $app['query']->getField('photo', $input['id']);
      unlink($app['root'] . $app['imagepath'] . $photo);
      $app['query']->deletePhoto($input['id']);
      Request::redirectTo('files');
    } else {
      throw new Exception('Invalid query');
    }
    
    
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}