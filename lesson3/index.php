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

