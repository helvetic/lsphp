<?php


class Request
{
  public static function getUri($folder = '/')
  {
    $uri = str_replace($folder, '', $_SERVER['REQUEST_URI']);
    return $uri;
  }
  
  
  public static function redirectTo ($uri) {
    $host  = $_SERVER['HTTP_HOST'];
    $path   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://$host$path/$uri");
    exit;
  }
}