<?php

require_once __DIR__ . '/vendor/autoload.php';



require_once 'core/File.php';
require_once 'core/Config.php';

$config = (new Config(__DIR__))->get();



require_once 'core/database/Connection.php';

Connection::make($config->db);