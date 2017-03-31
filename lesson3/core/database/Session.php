<?php

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
  protected $table = 'Sessions';
  public $timestamps = false;
  
  protected $guarded = ['id'];
  protected $primaryKey = "id";
  
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
    Session::find($id)->delete();
  }
  
  
}