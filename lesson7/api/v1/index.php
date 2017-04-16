<?php

require_once '../../boot.php';

require_once 'core/Parse.php';
require_once 'core/models/Route.php';
require_once 'core/models/Controller.php';
require_once 'core/models/View.php';

(new Route($_GET['url']))->start();

