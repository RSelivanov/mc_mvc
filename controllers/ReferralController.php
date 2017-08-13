<?php

/**
 * Контроллер ReferralController
 */
class ReferralController
{

    /**
     * Actoin для куки
     * @param $name <p>Имя</p>
     * @return view
     */
    public function actionAddcookie($name)
    {
        if(!isset($_COOKIE['referral']))
        setcookie("referral",$name,time()+3600, '/');
        header('Location: /register');
        
        // Подключаем вид
        require_once(ROOT . '/views/bar/index.php');
        return true;
    }
}
