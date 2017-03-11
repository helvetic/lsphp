<?php

if (!$app['auth']) {
  redirectTo('');
}

checkPermissions($app['auth']);

$users = $app['query']->getUsers();

require_once 'core/handlers/users.php';
require_once 'views/users.view.php';