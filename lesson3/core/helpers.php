<?php

function generateHash()
{
  $hash =  password_hash(bin2hex(random_bytes(6)), PASSWORD_BCRYPT);
  return $hash;
}

function generateCrypt($pass, $hash)
{
  return crypt($pass, $hash);
}

function checkPermissions($auth)
{
  if (!$auth) {
    throw new Exception('Доступ запрещён');
  }
}

function clearArray($data, $types)
{
  $result = [];
  foreach ($types as $key => $type)
  {
    $filtered = clearData($data[$key], $type);
    if (!is_null($filtered)) {
      $result[$key] = $filtered;
    }
  }
  return $result;
}

function clearData($data, $method)
{
  switch ($method) {
    case 'string':
      return (string) filter_var($data, FILTER_SANITIZE_SPECIAL_CHARS);
      break;
    case 'int':
      $filtered = filter_var($data, FILTER_SANITIZE_NUMBER_INT);
      if ($filtered != '') {
        return (int) $filtered;
      }
      break;
    default:
      return $data;
      break;
  }
}