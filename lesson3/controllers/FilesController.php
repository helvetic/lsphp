<?php

class FilesController extends Controller
{
  
  function __construct()
  {
    parent::__construct();
  
    $this->handle();
  
    
    $this->data->users = User::where('photo', '!=', NULL)->get();
    $this->data->menu = Menu::authList();
    
    $this->view->render($this->data);

  }
  
}