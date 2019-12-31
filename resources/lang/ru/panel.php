<?php

$array = [

    'title' => 'R&AS Panel',

    'application' => [
        'title' => 'Заявление в академию № ',
    ],

    'menu'                      => [
        'home'           => 'Главная',
        'personal_file'  => 'Личное дело студента',
        'application'    => 'Заявление в академию',
        'curators'    => 'Кураторы академии',
    ],

    'notifications'             =>  [
        'title'       => 'Уведомления',
        'info'        => 'Здесь отображены разного рода уведомления которые относяться непосредственно к процессу обучения и отбора.',
        'no_notify'   => 'Уведомления отсутствуют',
        'no_unread'   => 'Непрочитанные уведомления отсутствуют',
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
