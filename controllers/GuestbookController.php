<?php

/**
 * Контроллер GuestbookController
 */
class GuestbookController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex($parameters = null)//$page, $search, $key, $order //page=1&key=name&order=asm
    {   
            //var_dump($_REQUEST);
            // Парсим в массив
            parse_str($parameters, $mass);
            
            // Получаем данные и делаем их безопасными
            isset($mass['page']) ? $page = Guestbook::protectionData($mass['page']) : $page = '';
            isset($mass['search']) ? $search = Guestbook::protectionData($mass['search']) : $search = '';
            isset($mass['key']) ? $key = Guestbook::protectionData($mass['key']) : $key = '';
            isset($mass['order']) ? $order = Guestbook::protectionData($mass['order']) :  $order = '';
            
            // Дефолтные значения
            $username = false;
            $email = false;
            $homepage = false;
            $message = false;
            $messages_guest_list = false;
            $file_name = '';  
            
            // Флаг Создать новое сообщение или обновить старое (false - создать новое)
            //$edit_message_button = false;
            
            // Флаг ошибок
            $errors = false;
            
            $browser = Guestbook::getBrowser($_SERVER['HTTP_USER_AGENT']);
            $ip = $_SERVER['REMOTE_ADDR'];

            // Получаем данные и делаем их безопасными
            //$search = Guestbook::protectionData($search); 
            
            // Обратимся к методу который позволит узнать количество записей с учетом поиска.
            $count_messages = Guestbook::countMessagesFromGuestbook($search);
            
            // Вызываем метод для генерации страниц
            $pagination = Guestbook::pagesGenerator($count_messages, $page);
            //var_dump($_POST);
            if(!empty($_POST)) 
            {
                if(isset($_POST["new_message"]))
                {  
                    $path_files = ROOT . Config::getInstance()->get('path_files');
                    
                    // Получаем данные из формы и делаем их безопасными
                    $username = Guestbook::protectionData($_POST['username']);
                    $email = Guestbook::protectionData($_POST['email']);
                    $homepage = Guestbook::protectionData($_POST['homepage']);
                    $message = Guestbook::protectionData($_POST['message']);
                    
                    // Валидация полей 
                    if (!Guestbook::checkName($username)) {
                        $errors[] = 'Юзернейм должен состоять из цифр и символов латинского алфавита !';
                    } 
                    if (!Guestbook::checkEmail($email)) {
                        $errors[] = 'Вы ввели не корректный E-mail аддрес !';
                    } 
                    if (!empty($homepage) && !Guestbook::checkUrl($homepage)) {
                        $errors[] = 'Вы ввели не корректный url !';
                    } 
                    if (empty($message)) {
                        $errors[] = 'Текстовое поле не должно быть пустым!';
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
                            $errors[] = 'Проверка на робота не пройдена !';
                        }
                    } 

                    // Работа с файлами
                    if(isset($_FILES['guest_file']) && !$_FILES['guest_file']['name'] == "" ){
                        
                        // Проверяем на ошибки
			if($_FILES['guest_file']['error'] > 0){
                            $errors[] = Guestbook::errUploadFile($_FILES['guest_file']['error']);
                        }
                        
                        if(!Guestbook::checkFileImg($_FILES['guest_file']['type']) && !Guestbook::checkFileTxt($_FILES['guest_file']['type'])){
                            $errors[] = 'Файл имеет не верный формат, используйте: .png .jpg .gif .txt !';
                        }
                        
                        if(Guestbook::checkFileTxt($_FILES['guest_file']['type']) && $_FILES['guest_file']['size'] > 100000){
                            $errors[] = 'Текстовый файл превышает 100 кб !';
                        }
                        
                        // Получаем формат файла
                        $file_extension = Guestbook::getFileExtension($_FILES['guest_file']['name']);
                        
                        // Генерируем файлу имя
                        $file_name = uniqid().'.'.$file_extension ;
                        
                        // Загружаем файл
                        Guestbook::uploadFile($_FILES, $file_name);
                    }
                    
                    if ($errors == false) {  
                        // Создаем новое сообщение
                        if(!isset($_POST["update_row_id"]))
                        {
                            Guestbook::addMessage($username, $email, $homepage, $message, $file_name, $browser, $ip);                   
                            
                            // Получаем сообщения для гостевой книги (массив на отрисовку)
                            $messages_guest_list = Guestbook::getMessagesFromGuestbook($pagination['start'], $pagination['messages_amount'], $search, $key, $order);    

                            // Подключаем вид
                            require_once(ROOT . '/views/guestbook/index.php');
                        }
                        // В остальных случаях обновляем старое сообщение
                        else
                        {
                            $id = (int) Guestbook::protectionData($_POST["update_row_id"]);
                            
                            // Если имя файла не пустое
                            if(!empty($file_name)){
                                
                                // Узнаем имя файла по id строки
                                $old_file_name = Guestbook::getFileNameFromGuestbook($id);
                                
                                // Удаляем старый файл
                                if(!empty($old_file_name)) Guestbook::deleteFileFromGuestbook($old_file_name);
                                
                                // Записываем имя нового файла
                                Guestbook::updateFileNameFromGuestbook($id, $file_name);
                            }
                            //Обновляем само сообщение
                            Guestbook::updateMessageFromGuestbook($id, $username, $email, $homepage, $message, $browser, $ip);
                            
                            //Получаем обновленное сообщение
                            $messgae = Guestbook::getMessageOnIdFromGuestbook($id);
                            
                            //Формеруем JSON для ответа
                            $content = '{"status": "success", "username": "'.$username.'", "email": "'.$email.'", "homepage": "'.$homepage.'", "message": "'.$message.'", "file_name": "'.$messgae['file'].'", "date": "'.$messgae['date'].'"}';

                            // Подключаем вывод для ajax
                            require_once(ROOT . '/views/content/ajax.php');
                        }
                    }

                }
                if(isset($_POST["delete_message_id"])) //AJAX
                { 
                    $id = (int) Guestbook::protectionData($_POST["delete_message_id"]);
                    $old_file_name = Guestbook::getFileNameFromGuestbook($id);
                    
                    // Удаляем запись в бд
                    Guestbook::removeMessageFromGuestbook($id);
                    
                    // Удаляем файл с сервера
                    if(!empty($old_file_name)) Guestbook::deleteFileFromGuestbook($old_file_name);
                    
                    //Формеруем JSON для ответа
                    $content = '{"status": "success"}';
                    
                    // Подключаем вывод для ajax
                    require_once(ROOT . '/views/content/ajax.php');
                }
                if(isset($_POST["search_submit"]))
                {
                    // Получаем данные из формы и делаем их безопасными
                    $search = Guestbook::protectionData($_POST["search_text"]);
                    
                    if(!empty($search))
                    {
                        header("Location: /guestbook/".Guestbook::generateLink('search', $page, $search, $key, $order));
                    }
                    else
                    {
                        header("Location: /guestbook/".Guestbook::generateLink('search', $page, $search, $key, $order));
                    }
                    
                    // Получаем сообщения для гостевой книги (массив на отрисовку)
                    $messages_guest_list = Guestbook::getMessagesFromGuestbook($pagination['start'], $pagination['messages_amount'], $search, $key, $order);    

                    // Подключаем вид
                    require_once(ROOT . '/views/guestbook/index.php');
                }
            }
            else{
                // Получаем сообщения для гостевой книги (массив на отрисовку)
                $messages_guest_list = Guestbook::getMessagesFromGuestbook($pagination['start'], $pagination['messages_amount'], $search, $key, $order);    

                // Подключаем вид
                require_once(ROOT . '/views/guestbook/index.php');
            }
            
        // Получаем сообщения для гостевой книги (массив на отрисовку)
        //$messages_guest_list = Guestbook::getMessagesFromGuestbook($pagination['start'], $pagination['messages_amount'], $search, $key, $order);    

        // Подключаем вид
        //require_once(ROOT . '/views/guestbook/index.php');
        return true;
    }

   

}
