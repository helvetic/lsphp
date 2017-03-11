<?php

if ($app['auth']) {
  redirectTo('profile');
}

require_once 'core/handlers/register.php';
require_once 'views/register.view.php';

