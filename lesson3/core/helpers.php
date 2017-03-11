<?php

function clearData($data)
{
  $result = htmlspecialchars(trim($data));
  return $result;
}


function generateHash()
{
  $hash =  password_hash(bin2hex(random_bytes(6)), PASSWORD_BCRYPT);
  return $hash;
}

function generateCrypt($pass, $hash)
{
  return crypt($pass, $hash);
}

function checkPermissions ($auth) {
  if (!$auth) {
    throw new Exception('Доступ запрещён');
  }
}

function redirectTo ($uri) {
  $host  = $_SERVER['HTTP_HOST'];
  $path   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  header("Location: http://$host$path/$uri");
  exit;
}

