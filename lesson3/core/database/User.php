<?php

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  public $timestamps = false;
  
  public static function add($data)
  {
    return User::insertGetId($data);
  }
  
  
  
  public static function getOrderedBy($param, $dir = 'ASC')
  {
    return User::orderBy($param, $dir)
        ->get();
  }
  
  
  public static function checkLogin($login)
  {
    return User::where('login', $login)
        ->select('id')
        ->first();
  }
  
  
  public static function checkPass($field, $value, $pass)
  {
    $user = User::where($field, $value)
        ->select('password', 'salt')
        ->first();
    
    return hash_equals(generateCrypt($pass, $user->salt), $user->password);
  }
  
  public static function getWithPhotos()
  {
    return User::whereNotNull('photo')
        ->get();
  }
  
  public static function returnPhoto($id)
  {
    return User::where('id', $id)
        ->select('photo')
        ->first()
        ->photo;
  }
  
  public static function deletePhoto($id)
  {
    User::where('id', $id)
        ->update(['photo' => NULL]);
  }
  
  public static function updateData($id,$data)
  {
    User::where('id', $id)
      ->update($data);
  }
}