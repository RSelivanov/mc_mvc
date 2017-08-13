<?php

/**
 * Контроллер SiteController
 */
class StaticpageController
{

    /**
     * Actoin для статических страниц
     * @param $pagename <p>Имя страницы</p>
     * @return Img
     */
    public function actionIndex($pagename)
    {   
        $path = ROOT . '/views/staticpages/'.$pagename.'.php';
        if(file_exists($path)) {
        // Подключаем вид
        require_once($path);
        }else{
            echo 'Statc page not found !';
        }
        return true;
    }

   

}
