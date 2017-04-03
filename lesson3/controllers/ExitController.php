<?php


class ExitController extends Controller
{
  
  function __construct()
  {
    parent::__construct();
    
    session_unset();
    Session::deleteCurrent(App::id());
    
    Route::redirectTo('index');
  }
  
}

