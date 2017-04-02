<?php


class App
{
  public static $user;
  protected static $check;
  protected static $uri;
  protected static $controller;
  
  public static function auth()
  {
    if (!session_id()) {
      session_start();
    }
    
    if ($_COOKIE['id']) {
      $uid = $_COOKIE['id'];
      if (self::check($uid)) {
        self::$user = User::where('id', $uid)->first();
      }
    }
  }
  
  public static function check($uid = -1)
  {
    return Session::check($uid, session_id());
  }
  
  public static function user()
  {
    return self::$user;
  }
  
  public static function id()
  {
    return $_COOKIE['id'];
  }
  
  public static function uri($set = false)
  {
    if ($set !== false) {
      self::$uri = $set;
    }
    return self::$uri;
  }
  
  public static function controller($set = false)
  {
    if ($set !== false) {
      self::$controller = $set;
    }
    return self::$controller;
  }
  
  public static function exit()
  {
    session_unset();
    Session::deleteCurrent($app['id']);
    unset($_COOKIE['id']);
  
    Route::redirectTo('');
  }
}