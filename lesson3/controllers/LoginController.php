<?php

class LoginController extends Controller
{
  
  function __construct()
  {
    parent::__construct();
    
    $this->handle();
  
    $this->view->render($this->data);
  }

}