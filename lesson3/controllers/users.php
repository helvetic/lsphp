<?php

if (!$app['auth']) {
  Request::redirectTo('');
}

checkPermissions($app['auth']);

$users = $app['query']->getUsers('age');

require_once 'core/handlers/users.php';
require_once 'views/users.view.php';