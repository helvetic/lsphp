<?php

if (!$app['auth']) {
  Request::redirectTo('');
}

checkPermissions($app['auth']);


require_once 'core/handlers/profile.php';
require_once 'core/Menu.php';

$menu = new Menu();

$template = $twig->load('profile.twig');
echo $template->render([
    'post' => $_POST,
    'menu' => $menu->authList,
    'title' => 'Профиль',
    'h1' => 'Профиль',
    'user' => $app['user'],
    'imgpath' => $app['fullimagepath']
]);