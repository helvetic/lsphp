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
  
    $this->view->render($this->data);

  }

}

/*
if (!$app['auth']) {
  Request::redirectTo('');
}

checkPermissions($app['auth']);

$users = User::getOrderedBy('age');

foreach ($users as $user) {
  $user->adult = ($user->age >= 18) ? 'Совершеннолетний' : 'Несовершеннолетний';
}

require_once 'core/handlers/users.php';
require_once 'core/Menu.php';

$menu = new Menu();

$template = $twig->load('users.twig');
echo $template->render([
    'menu' => $menu->authList,
    'uri' => $menu->uri,
    'title' => 'Пользователи',
    'h1' => 'Список пользователей',
    'users' => $users,
    'imgpath' => $app['fullimagepath']
]);
*/