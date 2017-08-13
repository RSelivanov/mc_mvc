<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mailer
 *
 * @author Admin
 */
class Mailer {
    
    public function SendLostPassword($name, $ip, $email, $key){
        
        $tmp = new Template();
        $tmp->set('{username}', $name);
        $tmp->set('{ip}', $ip);
        $tmp->set('{key}', $key);
        $body = $tmp->out_content(ROOT.'/views/templates/lostpassword.tpl');
        
        require_once ROOT.'/lib/phpmailer/class.phpmailer.php';
        require_once ROOT.'/lib/phpmailer/class.smtp.php';
                                
        $mail = new PHPMailer;
        
        $mail->isSMTP();
        $mail->Host             =   'smtp.yandex.ru';
        $mail->SMTPAuth         =   true;
        $mail->SMTPSecure       =   'ssl';
        $mail->Port             =   465;
        $mail->CharSet          =   'UTF-8';
                                
        $mail->Username = 'mykubatura@yandex.ru';
        $mail->Password = '0106008446612668960';
        $mail->setFrom('mykubatura@yandex.ru', 'MyKubatura');
        $mail->Subject = 'Востановление пароля';
        $mail->msgHTML($body);
        $mail->addAddress($email, $name);
                                
        if($mail->send()){
            //echo 'Ok';
        }else{
            echo "Mailer Error: " .$mail->ErrorInfo;
        }
    }
    
     public function SendNewPassword($name, $email, $password){
        
        $tmp = new Template();
        $tmp->set('{username}', $name);
        $tmp->set('{password}', $password);
        $body = $tmp->out_content(ROOT.'/views/templates/newpassword.tpl');
        
        require_once ROOT.'/lib/phpmailer/class.phpmailer.php';
        require_once ROOT.'/lib/phpmailer/class.smtp.php';
                                
        $mail = new PHPMailer;
                                
        $mail->isSMTP();
        $mail->Host             =   'smtp.yandex.ru';
        $mail->SMTPAuth         =   true;
        $mail->SMTPSecure       =   'ssl';
        $mail->Port             =   465;
        $mail->CharSet          =   'UTF-8';
                                
        $mail->Username = 'mykubatura@yandex.ru';
        $mail->Password = '0106008446612668960';
        $mail->setFrom('mykubatura@yandex.ru', 'MyKubatura');
        $mail->Subject = 'Востановление пароля';
        $mail->msgHTML($body);
        $mail->addAddress($email, $name);
                                
        if($mail->send()){
            //echo 'Ok';
        }else{
            echo "Mailer Error: " .$mail->ErrorInfo;
        }
    }
                              

}
