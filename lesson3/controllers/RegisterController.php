<?php

class RegisterController extends Controller
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


require_once 'core/MailTo.php';
require_once 'core/handlers/register.php';

require_once 'core/Menu.php';

$menu = new Menu();

$template = $twig->load('register.twig');
echo $template->render([
    'post' => $_POST,
    'menu' => $menu->list,
    'uri' => $menu->uri,
    'title' => 'Регистрация',
    'h1' => 'Регистрация'
]);


*/