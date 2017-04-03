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
    $menu = $menu->toArray();
    $menu[] = ['uri' => 'exit', 'title' => 'exit'];

    return $menu;
  }
  
}