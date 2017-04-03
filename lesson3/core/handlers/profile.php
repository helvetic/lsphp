<?php

use Intervention\Image\ImageManagerStatic as Image;



if ($_POST) {
  
  global $config;
  
  $user = App::user()->toArray();
  
  if ($_POST['upload']) {
    $data = [];
    
    $input = clearArray($_POST, [
        'name' => 'string',
        'email' => 'email',
        'age' => 'int',
        'about' => 'string',
    ]);
  
    $is_valid = GUMP::is_valid($_POST, [
        'name' => 'required|min_len,5',
        'email' => 'required|valid_email',
        'age' => 'required|integer|min_numeric,10|max_numeric,100',
        'about' => 'required|min_len,50',
    ]);
  

    
    
    // Не придумал ничего умнее
    if ($user['photo']) {
      $photo = $user['photo'];
    }
    
    $user = array_replace_recursive($user, $input);
    
    if (!$user['photo'] && $photo) {
      $user['photo'] = $photo;
    }
    
    
    
    try {
  
      if($is_valid !== true) {
        throw new Exception($is_valid[0]);
      }
    
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
          
          Image::make($file['tmp_name'])
              ->fit(480, 480)
              ->save($uploadfile);
          
          $user['photo'] = $filename;
  
        } else {
          throw new Exception('File is not an image');
        }
      }
      
      User::updateData(App::id(), $user);
      
      App::$user = (object) $user;
      
      echo 'Profile updated', '<br>';
      
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
  
  if ($_POST['add_watermark']) {
    
    if ($_FILES['watermark']['size'] != 0) {
    
      $file = $_FILES['watermark'];
      $uploadfile = $config->root . $config->imagepath . App::$user->photo;
    
      if(exif_imagetype($file['tmp_name'])) {
        
        $img = Image::make($uploadfile);
        
        $watermark = Image::make($file['tmp_name'])
            ->fit(40, 40)
            ->opacity(50)
            ->rotate(45);
        
        $img->insert($watermark, 'bottom-right', 10, 10)
            ->save($uploadfile);
      
      } else {
        throw new Exception('File is not an image');
      }
    }
  }
  
}