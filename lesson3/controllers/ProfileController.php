<?php


class ProfileController extends Controller
{

  function __construct()
  {
    parent::__construct();
    
    $this->handle();
    
    $this->data->user = App::user();
    $this->data->h1 = $this->data->h1 . ' ' . App::user()->login;
    $this->data->menu = Menu::authList();
  
    $this->view->render($this->data);

  }
  
}