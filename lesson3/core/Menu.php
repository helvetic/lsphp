<?php


class Menu
{
  
  public static function list()
  {
    return Page::where('protected', 0)->get();
  }
  
  public static function authList()
  {
    $menu = Page::select('uri', 'title')->where('protected', 1)->get();
//    var_dump($menu);
//    $exit = new stdClass();
//    $exit->uri = 'exit';
//    array_push($menu->items, $exit);
    // TODO add exit
    return $menu;
  }
  
}