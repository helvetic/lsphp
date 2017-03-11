<?php
class Connection
{
  public static function make($db)
  {
    $dsn = "{$db['type']}:host={$db['host']};dbname={$db['name']}{$db['params']}";
    
    try {
      return new PDO($dsn, $db['user'], $db['pass']);
    } catch (PDOException $e) {
      die('Подключение не удалось: ' . $e->getMessage());
    }
  }
}
