<?php

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

