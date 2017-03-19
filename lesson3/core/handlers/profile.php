<?php

if ($_POST) {
  $data = [];
  
  $input = clearArray($_POST, [
      'name' => 'string',
      'age' => 'int',
      'about' => 'string',
  ]);
  
  
  // Не придумал ничего умнее
  if ($app['user']['photo']) {
    $photo = $app['user']['photo'];
  }
  
  $app['user'] = array_replace_recursive($app['user'], $input);
  
  if (!$app['user']['photo']) {
    $app['user']['photo'] = $photo;
  }
  
  
  
  try {
  
    if(isset($_POST['age'])) {
      if (is_null($input['age'])) {
        throw new Exception('Age must be a number');
      }
      if ($input['age'] == 0) {
        throw new Exception('Age must be more then 0');
      }
      if ($input['age'] > 999) {
        throw new Exception('Sorry! You are way too old.');
      }
    }

    
    if ($_FILES['photo']['size'] != 0) {
      
      $file = $_FILES['photo'];
      $filename = basename($file['name']);
      $uploadfile = $app['root'] . $app['imagepath'] . $filename;
      
      if(exif_imagetype($file['tmp_name'])) {
        if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
          $app['user']['photo'] = $filename;
          echo 'Image was uploaded', '<br>';
        } else {
          throw new Exception('Can\'t upload image');
        }
      } else {
        throw new Exception('File is not an image');
      }
    }
    
    $app['query']->setUserData($app['id'], $app['user']);
    
    echo 'Profile updated', '<br>';
    
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}