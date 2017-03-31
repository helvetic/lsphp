<?php
use Illuminate\Database\Capsule\Manager as Capsule;


class Connection
{
  public static function make($db)
  {
    $capsule = new Capsule;
    
    try {
      $capsule->addConnection($db);
    } catch (PDOException $e) {
      die('Подключение не удалось: ' . $e->getMessage());
    }
  
    $capsule->setAsGlobal();
  
    $capsule->bootEloquent();
  }
}
