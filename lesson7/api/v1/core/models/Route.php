<?php


class Route
{
  public $url;
  function __construct($url)
  {
    $this->url = Parse::uri($url);
  }
  
  
  public function start()
  {
    echo 'Im router<br>';
    print_r($this->url);
  }
}