<?php

if ($app['auth']) {
  Request::redirectTo('profile');
}

require_once 'core/handlers/login.php';
require_once 'views/login.view.php';

