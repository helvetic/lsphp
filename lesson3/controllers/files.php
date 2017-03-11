<?php

if (!$app['auth']) {
  redirectTo('');
}

checkPermissions($app['auth']);

$users = $app['query']->getPhotos();

require_once 'core/handlers/files.php';
require_once 'views/files.view.php';