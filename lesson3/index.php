<?php

require_once __DIR__ . '/vendor/autoload.php';

require_once 'core/helpers.php';
require_once 'core/File.php';
require_once 'core/Config.php';
require_once 'core/Parse.php';
require_once 'core/Menu.php';
require_once 'core/MailTo.php';
require_once 'core/ReCaptcha.php';

$config = (new Config(__DIR__))->get();



require_once 'core/database/Connection.php';

Connection::make($config->db);



require_once 'core/data/Session.php';
require_once 'core/data/User.php';
require_once 'core/data/Page.php';

require_once 'core/App.php';

App::auth();



require_once 'core/models/Route.php';
require_once 'core/models/Model.php';
require_once 'core/models/View.php';
require_once 'core/models/Controller.php';

(new Route())->run();



/*
if (!session_id()) {
  session_start();
}

// app start
$folder = str_replace('index.php', '',$_SERVER['SCRIPT_NAME']);
$url = $_SERVER['HTTP_HOST'] . $folder;
$domain = "//{$url}";

$app = [];
$app['root'] = __DIR__;
$app['imagepath'] = '/img/uploads/';
$app['fullimagepath'] = "{$domain}img/uploads/";
$app['config'] = require 'config.php';

require_once $app['root'] . '/vendor/autoload.php';
require_once 'core/helpers.php';
require_once 'core/ReCaptcha.php';
require_once 'core/database/Connection.php';
require_once 'core/database/Session.php';
require_once 'core/database/User.php';
//require_once 'core/database/DB.php';


// connect database
// prepare pdo instance
Connection::make($app['config']['db']);


if ($_COOKIE['id']) {
  $app['id'] = $_COOKIE['id'];
  $app['auth'] = Session::check($app['id'], session_id());
  $app['user'] = User::find($app['id']);
}


//twig
$loader = new Twig_Loader_Filesystem('views/');
$twig = new Twig_Environment($loader, [
    'debug' => true
//    'cache' => '/cache/'
]);
$twig->addExtension(new Twig_Extension_Debug());

require_once 'core/Request.php';
$app['routes'] = require_once 'routes.php';

try {
  $folder = $app['config']['site']['folder'];
  if (isset($app['routes'][Request::getUri($folder)])) {
    require_once $app['routes'][Request::getUri($folder)];
  } else {
    throw new Exception('Page not found');
  }
} catch (Exception $e) {
  die($e->getMessage());
}
*/
