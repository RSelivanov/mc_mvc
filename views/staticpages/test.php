<?php include ROOT . '/views/layouts/header.php'; ?>

            <div class="container">
                <div class="row">
                    
                    <?php
                    //Подключаем Бар
                    $BarController = new BarController;
                    $BarController ->actionIndex();
                    ?>
                    
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <div class="content-box mt-15">
                            <div class="content-wrapper">
                                
                                <div class="t-center f-bold">С этой страницы вы сможете проголосовать за проект</div>
                                <br>
			
                                <?php
                                //$settings = Config::getInstance();
                                // print($settings->get("app_name")); 

                                /*
                                $tmp = new Template();
                                $tmp->set('{username}', 'Vasa');
                                $tmp->set('{ip}', '0.1.2.3.4.5.6');
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
                                
                                //$body = file_get_contents( $cont );
                                $mail->Username = 'mykubatura@yandex.ru';
                                $mail->Password = '0106008446612668960';
                                $mail->setFrom('mykubatura@yandex.ru', 'MyKubatura');
                                $mail->Subject = 'Востановление пароля';
                                $mail->msgHTML($body);
                                $address = 'ruslan.selivanow@gmail.com';
                                $mail->addAddress($address, 'UserName');
                                
                                //echo $body;
                                if($mail->send()){
                                    echo 'Ok';
                                }else{
                                    echo "Mailer Error: " .$mail->ErrorInfo;
                                }
                                */
                                
                                /* 11. Выберите верный ответ */
                                /*
                                $var = 1;
                                function fun($var){
                                    $var = 2;
                                }
                                fun(3);
                                echo $var;
                                */
                                /*
                                1
                                2
                                3
                                Фатальная ошибка.
                                */
                                
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
