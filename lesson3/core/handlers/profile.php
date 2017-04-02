<?php
if ($_POST) {
  global $config;
  
  $data = [];
  
  $input = clearArray($_POST, [
      'name' => 'string',
      'email' => 'email',
      'age' => 'int',
      'about' => 'string',
  ]);
  
  $user = App::user()->toArray();
  
  // Не придумал ничего умнее
  if ($user['photo']) {
    $photo = $user['photo'];
  }
  
  $user = array_replace_recursive($user, $input);
  
  if (!$user['photo'] && $photo) {
    $user['photo'] = $photo;
  }
  
  
  
  try {
  
    if($_POST['age']) {
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
  
    if ($_POST['email']) {
      if ($input['email']) {
        $data['email'] = $input['email'];
      } else {
        throw new Exception('Wrong email address');
      }
    }

    
    if ($_FILES['photo']['size'] != 0) {
      
      $file = $_FILES['photo'];
      $filename = basename($file['name']);
      $uploadfile = $config->root . $config->imagepath . $filename;
      
      if(exif_imagetype($file['tmp_name'])) {
        if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
          $user['photo'] = $filename;
          echo 'Image was uploaded', '<br>';
        } else {
          throw new Exception('Can\'t upload image');
        }
      } else {
        throw new Exception('File is not an image');
      }
    }
    
    User::updateData(App::id(), $user);
    App::$user = $user;
    
    echo 'Profile updated', '<br>';
    
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}