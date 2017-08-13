<?php

/**
 * Контроллер GuestbookController
 */
class GuestbookController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex($page, $search, $key, $order)
    {   
            // Дефолтные значения
            $username = false;
            $email = false;
            $homepage = false;
            $message = false;
            $messages_guest_list = false;
            $file_name = '';  
            
            // Флаг Создать новое сообщение или обновить старое (false - создать новое)
            $edit_message_button = false;
            
            // Флаг ошибок
            $errors = false;
            
            $browser = Guestbook::getBrowser($_SERVER['HTTP_USER_AGENT']);
            $ip = $_SERVER['REMOTE_ADDR'];

            // Получаем данные и делаем их безопасными
            $search = Guestbook::protectionData($search); 
            
            // Обратимся к методу который позволит узнать количество записей с учетом поиска.
            $count_messages = Guestbook::countMessagesFromGuestbook($search);
            
            // Вызываем метод для генерации страниц
            $pagination = Guestbook::pagesGenerator($count_messages, $page);
            
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
                    if($_FILES['guest_file']['size'] != 0){

                        // Проверяем на ошибки
			if($_FILES['guest_file']['error'] > 0){
                            $errors[] = Guestbook::ErrUploadFile($_FILES['guest_file']['error']);
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
                        }
                    }
                }
                if(isset($_POST["edit_message"]))
                { 
                    // Флаг Создать новое сообщение или обновить старое (false - создать новое)
                    $edit_message_button = true;
                    
                    $message_id = (int) Guestbook::protectionData($_POST["row_id"]);
                    $edit_message_guest_list = Guestbook::getMessageOnIdFromGuestbook($message_id);
                    
                    $username = $edit_message_guest_list['username'];
                    $email = $edit_message_guest_list['email'];
                    $homepage = $edit_message_guest_list['homepage'];
                    $message = $edit_message_guest_list['message'];
                }
                if(isset($_POST["delete_message"]))
                { 
                    $id = (int) Guestbook::protectionData($_POST["row_id"]);;
                    $old_file_name = Guestbook::getFileNameFromGuestbook($id);
                    
                    // Удаляем запись в бд
                    Guestbook::removeMessageFromGuestbook($id);
                    
                    // Удаляем файл с сервера
                    if(!empty($old_file_name)) Guestbook::deleteFileFromGuestbook($old_file_name);
                }
                if(isset($_POST["search_submit"]))
                {
                    // Получаем данные из формы и делаем их безопасными
                    $search = Guestbook::protectionData($_POST["search_text"]);
                    
                    if(!empty($search))
                    {
                        header("Location: /guestbook/1/$search/id/desc");
                    }
                    else
                    {
                        header('Location: /guestbook/1/0/id/desc');
                    }
                    
                }
            }
            
        // Получаем сообщения для гостевой книги (массив на отрисовку)
        $messages_guest_list = Guestbook::getMessagesFromGuestbook($pagination['start'], $pagination['messages_amount'], $search, $key, $order);    

        // Подключаем вид
        require_once(ROOT . '/views/guestbook/index.php');
        return true;
    }

   

}
