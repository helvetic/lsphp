<?php

class FilesController extends Controller
{
  
  function __construct()
  {
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

$users = User::getWithPhotos();

require_once 'core/handlers/files.php';
require_once 'core/Menu.php';

$menu = new Menu();

$template = $twig->load('files.twig');
echo $template->render([
    'menu' => $menu->authList,
    'uri' => $menu->uri,
    'title' => 'Файлы',
    'h1' => 'Файлы',
    'users' => $users,
    'imgpath' => $app['fullimagepath']
]);

*/