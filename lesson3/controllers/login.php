<?php

if ($app['auth']) {
  redirectTo('profile');
}

require_once 'core/handlers/login.php';
require_once 'views/login.view.php';

