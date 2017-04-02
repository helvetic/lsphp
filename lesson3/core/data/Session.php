<?php

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
  public $timestamps = false;
  
  public static function check($id, $sessid)
  {
    $session = Session::find($id);
    if ($session->sessid == $sessid) {
      return true;
    } else {
      return false;
    }
  }
  
  public static function add($id, $sessid)
  {
    return Session::insertGetId(
        [
            'id' => $id,
            'sessid' => $sessid
        ]
    );
  }
  
  
  public static function deleteCurrent($id)
  {
    Session::destroy($id);
  }
  
  
}