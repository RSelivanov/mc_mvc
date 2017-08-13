<?php

return array(

    //guestbook / страницы / поисковая фраза / колонка для сортировки / направление сортировки (desc asc)
    'guestbook/([0-9]+)/([\s\a-zA-Z0-9_ ]+)/([a-zA-Z]+)/([a-zA-Z]+)' => 'guestbook/index/$1/$2/$3/$4',
    
    'payment' => 'payment/index',
    
    //Срвер
    'info/([a-zA-Z0-9]+)' => 'server/serverinfo/$1',
    'toplist/([a-zA-Z0-9]+)' => 'server/toplist/$1',
    'banlist/([a-zA-Z0-9]+)' => 'server/banlist/$1',
    
    //Пользователь
    'user/([a-zA-Z0-9]+)' => 'user/userpage/$1',
    'view' => 'user/view',
    'balance' => 'user/balance',
    
    //Формирует скин (/skin/name/part
    'skin/([\s\a-zA-Z0-9_ ]+)/([a-zA-Z0-9]+)' => 'skin/index/$1/$2',
    
    'register' => 'user/register',
    'login' => 'user/login',
    'logout' => 'user/logout',
    'lostpassword/([a-zA-Z0-9]+)' => 'user/lostpassword/$1',
    
    'staticpage/([a-zA-Z0-9]+)' => 'staticpage/index/$1',
    
    'news' => 'news/index',
    'product' => 'product/list',
    
    'referral/([a-zA-Z0-9]+)' => 'referral/addcookie/$1',
    
    //Левый бар сайта
    'bar' => 'bar/index',
    
    //Второе меню
    'secondmenu' => 'secondmenu/index',
    
    // Главная страница
    'index.php' => 'main/index',
    'index' => 'main/index',
   );

