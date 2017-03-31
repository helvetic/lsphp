<?php

session_unset();
Session::deleteCurrent($app['id']);
unset($_COOKIE['id']);

Request::redirectTo('');
