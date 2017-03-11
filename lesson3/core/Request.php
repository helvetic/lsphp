<?php


class Request
{
  public static function uri()
  {
    $uri = trim(substr($_SERVER['REQUEST_URI'], 8), '/');
    return $uri;
  }
}