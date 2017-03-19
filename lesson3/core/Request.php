<?php


class Request
{
  public static function uri()
  {
    $uri = trim(substr($_SERVER['REQUEST_URI'], 8), '/');
    return $uri;
  }
  
  
  public static function redirectTo ($uri) {
    $host  = $_SERVER['HTTP_HOST'];
    $path   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://$host$path/$uri");
    exit;
  }
}