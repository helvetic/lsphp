<?php

if (!$app['auth']) {
  Request::redirectTo('');
}

checkPermissions($app['auth']);

$users = $app['query']->getUsers('age');

$users = array_map(function ($user) {
  $user['adult'] = ($user['age'] >= 18) ? 'Совершеннолетний' : 'Несовершеннолетний';
  return $user;
},$users);



require_once 'core/handlers/users.php';
require_once 'core/Menu.php';

$menu = new Menu();

$template = $twig->load('users.twig');
echo $template->render([
    'menu' => $menu->authList,
    'title' => 'Пользователи',
    'h1' => 'Список пользователей',
    'users' => $users,
    'imgpath' => $app['fullimagepath']
]);