<?php

class UsersController extends Controller
{
  function __construct()
  {
    global $config;
    parent::__construct();
  
    $this->handle();
  
    $this->data->users = User::getOrderedBy('age');
    $this->data->menu = Menu::authList();
  
    foreach ($this->data->users as $user) {
      $user->adult = ($user->age >= 18) ? 'Совершеннолетний' : 'Несовершеннолетний';
    }
  
    $this->view->render($this->data);

  }

}
