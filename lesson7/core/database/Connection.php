<?php
use Illuminate\Database\Capsule\Manager as Capsule;


class Connection
{
  public static function make($db)
  {
    $capsule = new Capsule;
  
    $capsule->addConnection((array) $db);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
  }
}
