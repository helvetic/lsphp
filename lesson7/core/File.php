<?php


class File
{
  
  public static function read($file)
  {
    $output = fopen($file, "r");
    $data = fread($output, filesize($file));
    fclose($output);
  
    return $data;
  }
  
  
  public static function exist($file)
  {
    return file_exists($file);
  }
  
}