<?php

if (!$app['auth']) {
  redirectTo('');
}

checkPermissions($app['auth']);


require_once 'core/handlers/profile.php';
require_once 'views/profile.view.php';