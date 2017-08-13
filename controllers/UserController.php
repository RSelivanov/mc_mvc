<?php

/**
 * Контроллер UserController
 */
class UserController {
    
    /**
     * Action для страницы "Регистрация"
     */
    public function actionRegister()
    {
        // Переменные для формы
        $name = false;
        $password = false;
        $password2 = false;
        $email = false;
        $recaptcha = false;
        $result = false;
        

       

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            } 
            if (User::checkNameExists($name)) {
                $errors[] = 'Такой никнейм уже используется';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный адрес электронной почты';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (!User::matchPasswords($password, $password2)) {
                $errors[] = 'Пароли не совпадают';
            }
           
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой адрес электронной почты уже используется';
            }
            
            if(Config::getInstance()->get('captcha')){ 
                // Ваш секретный ключ
                $secret = Config::getInstance()->get('secret_key');

                // Пустой ответ
                $response = null;
                
                // Переменные для формы
                $recaptcha = $_POST['g-recaptcha-response'];
                
                // Проверка секретного ключа
                $reCaptcha = new ReCaptcha($secret);
                $response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $recaptcha);

                if ($response == null || !$response->success){
                    $errors[] = 'Проверка на робота не пройдена';
                }
            } 
            
            if ($errors == false) {
                // Если ошибок нет
                // Регистрируем пользователя
                $id = User::register($name, $email, $password);
                
                //Награждаем пользователя по реферальной системе
                if(isset($_COOKIE['referral'])){
                    User::giveReferralBonus($_COOKIE['referral']);
                }
                
                if($id != false && $id != NULL){
                    // Запоминаем пользователя (сессия)
                    User::auth($id);
                    
                    // Перенаправляем пользователя 
                    header("Location: /");
                }
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/user/register.php');
        return true;
    }
    
     /**
     * Action для страницы "Вход на сайт"
     */
    public function actionLogin()
    {
        // Переменные для формы
        $nickname = false;
        $password = false;
        
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $nickname = $_POST['nickname'];
            $password = $_POST['password'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            /*
            if (!User::checkEmail($nickname)) {
                $errors[] = 'Неправильный email';
            }
             */
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($nickname, $password);

            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);
                
                // Перенаправляем пользователя 
                header("Location: /");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/site/index.php');
        return true;
    }
    
    /**
    * Удаляем данные о пользователе из сессии
    */
    public function actionLogout()
    {
        // Стартуем сессию
        //session_start();
        
        // Удаляем информацию о пользователе из сессии
        unset($_SESSION["user"]);
        
        // Перенаправляем пользователя на главную страницу
        header("Location: /");
    }
    
    /**
     * Action для страницы "Забыл пароль"
     */
    public function actionLostpassword($part)
    {
        switch ($part) {
        case 'send':
            // Переменные для формы
            $name = false;
            $email = false;
            $nameoremail = false;
            $recaptcha = false;
            $result = false;

            // ваш секретный ключ
            $secret = "6Ld_5SQUAAAAALqt1gIzJukFN6ZYp7wvsklOsC3t";
            // пустой ответ
            $response = null;
            // проверка секретного ключа
            $reCaptcha = new ReCaptcha($secret);

            // Обработка формы
            if (isset($_POST['submit'])) {
                // Если форма отправлена 
                // Получаем данные из формы
                $nameoremail = $_POST['nameoremail'];
                $recaptcha = $_POST['g-recaptcha-response'];

                // Флаг ошибок
                $errors = false;

                // Валидация полей
                if (!User::checkName($nameoremail)) {
                    $errors[] = 'Имя или дрес электронной должно быть не короче 2-х символов';
                } 
                if (!User::checkNameExists($nameoremail) && !User::checkEmailExists($nameoremail)) {
                    $errors[] = 'Такой пользователь не найден';
                }

                $response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $recaptcha);

                if ($response == null || !$response->success){
                    $errors[] = 'Проверка на робота не пройдена';
                }

                if ($errors == false) {
                    // Если ошибок нет
                    $name = $nameoremail;
                    $email = $nameoremail;      
                    if (User::checkNameExists($nameoremail)) {
                        //если это имя пользователя получаем мейл
                        $email = User::getEmailByName($name);
                    }
                    else{
                        //в остальных случаях это мейл поэтому получем имя пользователя
                        $name = User::getNameByEmail($email);
                    }

                    $key = md5(uniqid());

                    User::setSectrtKey($key, $name);

                    $mail = new Mailer();
                    $mail->SendLostPassword($name, $_SERVER["REMOTE_ADDR"], $email, $key);
                    header("Location: /lostpassword/sent");
                }
            }
            require_once(ROOT . '/views/user/lostpassword.php');
            break;
            
        case 'sent':
            $content = 'Письмо со ссылкой на востановление пароля отправлено на ваш адрес электронной почты!';
            require_once(ROOT . '/views/content/empty.php');
            break;
        
        default:
            $name = User::getNameBySecretkey($part);
            If(!$name == ''){
                $newpassword = uniqid();
                $email = User::getEmailByName($name);
                User::changePassword($newpassword, $name);

                $mail = new Mailer();
                $mail->SendNewPassword($name, $email, $newpassword);
                $content = 'Пароль был изменен и отправлен на ваш адрес электронной почты!';
                User::setSectrtKey('', $name);
            }else{
                $content = 'Неверный ключ!';
            }
            require_once(ROOT . '/views/content/empty.php');
            break;
        } 
        return true;
    }
    
    /**
    * Страница пользователя
    */
    public function actionUserpage($name)
    {
        // Получаем информацию о пользователе из БД
        $user = User::getUserByName($name);
        if(!$user){
            echo 'User not found !';
        } else {
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
            $newslist = News::getNewsListByName($name);
            // Подключаем вид
            require_once(ROOT . '/views/user/userpage.php');
        }
        return true;
    }
    
    /**
    * Страница вида
    */
    public function actionView()
    {   
        $errors = false;
        
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
        
        if ( isset ( $_POST['skin'] ) ) {
            if (!empty ($_FILES['skin_file']['tmp_name'])) {
                $errors = Files::uploadSkin($_FILES, $user['name']);
            }
         }
         
        if ( isset ( $_POST['cloak'] ) ) {
           if (!empty ($_FILES['cloak_file']['tmp_name'])) {
                $errors = Files::uploadCloak($_FILES, $user['name']);
            }  
        }
         
        require_once(ROOT . '/views/user/view.php');
        return true;
    }
    
    /**
    * Страница баланса
    */
    public function actionBalance()
    {   
        $errors = false;
        
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        
        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
        
        if ( isset ( $_POST['payment'] ) ) {
            Payment::freekassa_pay($_POST['moneypay'], $user['name']);
        }
         
        require_once(ROOT . '/views/user/balance.php');
        return true;
    }
}
