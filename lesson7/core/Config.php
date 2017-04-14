<?php


class Config
{
  
    protected $config;
  
  
  //
    function __construct($root)
    {
        $data = File::read($root . '/config.json');
        $this->config = json_decode($data);
  
        $this->config->root = $root;
    }
  
  
  
    public function get()
    {
        return $this->config;
    }

    public function some()
    {
        $some = 'smth';
        $so
    }
}
