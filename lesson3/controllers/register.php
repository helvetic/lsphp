<?php

if ($app['auth']) {
  Request::redirectTo('profile');
}

require_once 'core/handlers/register.php';
require_once 'views/register.view.php';

