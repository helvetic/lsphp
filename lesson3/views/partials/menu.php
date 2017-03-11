<?php

$uri = $_SERVER['REQUEST_URI'];





$menu = [
    [
        'title' => 'Регистрация',
        'link' => '/lesson3/'
    ],
    [
        'title' => 'Авторизация',
        'link' => '/lesson3/login'
    ]
];

$authMenu = [
    [
        'title' => 'Профиль',
        'link' => '/lesson3/profile',
        'auth' => true
    ],
    [
        'title' => 'Пользователи',
        'link' => '/lesson3/users',
        'auth' => true
    ],
    [
        'title' => 'Фотографии',
        'link' => '/lesson3/files',
        'auth' => true
    ],
    [
        'title' => 'Выход',
        'link' => '/lesson3/exit',
        'auth' => true
    ],
];

function displayMenuItems($menu, $uri)
{
  foreach ($menu as $item) {
    $class = ($uri ===  $item['link']) ? ' button-outline' : '';
    echo "<a href='{$item['link']}' class='button{$class}'>{$item['title']}</a>\r\n";
  }
}

?>
<nav>
  <?php
    if ($app['auth']) {
       displayMenuItems($authMenu, $uri);
    } else {
       displayMenuItems($menu, $uri);
    }
  ?>
</nav>