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

/*
if ($app['auth']) {
  Request::redirectTo('profile');
}

require_once 'core/handlers/login.php';
require_once 'core/Menu.php';

$menu = new Menu();

$template = $twig->load('login.twig');
echo $template->render([
    'post' => $_POST,
    'menu' => $menu->list,
    'uri' => $menu->uri,
    'title' => 'Авторизация',
    'h1' => 'Авторизация',
]);
*/
