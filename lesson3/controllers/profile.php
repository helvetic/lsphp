<?php

if (!$app['auth']) {
  Request::redirectTo('');
}

checkPermissions($app['auth']);


require_once 'core/handlers/profile.php';
require_once 'views/profile.view.php';