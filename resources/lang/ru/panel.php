<?php

$array = [

    'title'                     => 'R&AS Panel',

    'application'               => [
        'title' => 'Заявление в академию ',
    ],

    'curators'                  =>  [
        'title' =>  'Кураторы',
        'text'  =>  'Здесь отображен список действующих кураторов и учителей академии;'
    ],

    'menu'                      => [
        'home'           => 'Главная',
        'personal_file'  => 'Личное дело студента',
        'application'    => 'Заявление в академию',
        'curators'       => 'Кураторы академии',
        'lections'       =>  'Лекции'
    ],

    'notifications'             =>  [
        'title'       => 'Уведомления',
        'info'        => 'Здесь отображены разного рода уведомления которые относяться непосредственно к процессу обучения и отбора.',
        'no_notify'   => 'Уведомления отсутствуют',
        'no_unread'   => 'Непрочитанные уведомления отсутствуют',
    ],

    'lections'             =>  [
        'title'             => 'Работа с лекциями',
        'info'              => 'На данной странице отображены все доступные Вам лекционные материалы.',
        'no_lections'       => 'Лекции отсутствуют',
        'no_author'         => 'Автор недоступен'
    ]
];

foreach($array as $n => $value)
{
    if (is_array($value) == true and $n == 'menu')
    {
        foreach ($value as $key => $element)
        {
            $value[$key] = mb_strtoupper($element);
        }
        $array[$n] = $value;
    }

}

return $array;
