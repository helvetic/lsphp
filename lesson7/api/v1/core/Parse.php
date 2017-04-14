<?php


class Parse
{
  public static function uri($url, $folder = '/')
  {
    $uri = str_replace($folder, '', $url);
    return $uri;
  }
}