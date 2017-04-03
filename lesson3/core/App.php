<?php


class App
{
  
  public static $user;
  
  protected static $check;
  protected static $uri;
  protected static $controller;
  protected static $auth;
  protected static $id;
  
  
  
  public static function auth()
  {
    if (!session_id()) {
      session_start();
    }
    
    if ($_COOKIE['id']) {
      self::$id = $_COOKIE['id'];
      if (self::check(self::$id)) {
        self::$user = User::where('id', self::$id)->first();
        self::$auth = true;
      } else {
        self::$auth = false;
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
    return self::$id;
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
  
  
  
  public static function isAuth()
  {
    return self::$auth;
  }

}