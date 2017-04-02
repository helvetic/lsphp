<?php

class DefaultController extends Controller
{
  
  function __construct()
  {
    parent::__construct();
    
    $this->view->render($this->data);
  }

}