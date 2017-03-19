<?php

session_unset();
$app['query']->deleteSession($app['id']);
unset($_COOKIE['id']);

Request::redirectTo('');
