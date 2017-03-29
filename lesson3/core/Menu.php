<?php


class Menu
{
  public $uri;
  public $list;
  public $authList;
  
  function __construct()
  {
    $this->uri = $_SERVER['REQUEST_URI'];
  
    $this->list = [
        [
            'title' => 'Регистрация',
            'link' => '/lesson3/'
        ],
        [
            'title' => 'Авторизация',
            'link' => '/lesson3/login'
        ]
    ];
    
    $this->authList = [
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

  }
}