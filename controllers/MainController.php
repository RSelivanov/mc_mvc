<?php

/**
 * Контроллер MainController
 */
class MainController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {   
            if(!empty($_POST)) {
                if(!empty($_POST["content"])){
                    $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
                    News::addNews($name, $content);
                }
                if(!empty($_POST["like"])){
                    if(!User::isGuest()){
                        if(News::checkLike(User::getSession(), $_POST["like"])){
                            News::removeLike($_POST["like"]); 
                            News::removeLikeIndicator(User::getSession(), $_POST["like"]);
                        }else{
                            News::addLike($_POST["like"]);
                            News::addLikeIndicator(User::getSession(), $_POST["like"]);
                        }
                    }
                }
                if(!empty($_POST["delete"])){
                     News::deleteNews($_POST["delete"]);
                }
            }
            
        $newslist = News::getNewsList();
        // Подключаем вид
        require_once(ROOT . '/views/main/index.php');
        return true;
    }

   

}
