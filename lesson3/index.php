<?php

if (!session_id()) {
  session_start();
}

// app start
$app = [];
$app['root'] = __DIR__;
$app['imagepath'] = '/img/uploads/';
$app['fullimagepath'] = '/lesson3/img/uploads/';
$app['config'] = require 'config.php';

require_once 'core/helpers.php';
require_once 'core/database/Connection.php';
require_once 'core/database/Query.php';


// connect database
// prepare pdo instanse
$app['query'] = new Query(Connection::make($app['config']['db']));


if ($_COOKIE['id']) {
  $app['id'] = $_COOKIE['id'];
  $app['auth'] = $app['query']->checkSession($app['id'], session_id());
  $app['user'] = $app['query']->getUserData($app['id']);
}

require_once 'core/Request.php';
$app['routes'] = require_once 'routes.php';

try {
  if (isset($app['routes'][Request::uri()])) {
    require_once $app['routes'][Request::uri()];
  } else {
    throw new Exception('Page not found');
  }
} catch (Exception $e) {
  die($e->getMessage());
}