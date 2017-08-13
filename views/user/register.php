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
                                
                                <?php if(!User::isGuest()){ echo 'Вы уже авторизированы !'; }else{ ?>
                                
                                <form action="" method="post">
                                    <hr class="hr-small mt-0">
                                    <div class="horizontal-box">
                                        <label class="horizontal-box-name">Никнейм</label>
                                        <div class="horizontal-box-input"><input type="text" name="name" class="form-control" value="<?php echo $name; ?>"/></div>
                                    </div>
                                    <hr class="hr-small">
                                    <div class="horizontal-box">
                                        <label class="horizontal-box-name">Пароль</label>
                                        <div class="horizontal-box-input"><input type="password" name="password" class="form-control" value="<?php echo $password; ?>"/></div>
                                    </div>
                                    <hr class="hr-small">
                                    <div class="horizontal-box">
                                        <label class="horizontal-box-name">Повторите пароль</label>
                                        <div class="horizontal-box-input"><input type="password" name="password2" class="form-control" value="<?php echo $password2; ?>"/></div>
                                    </div>
                                    <hr class="hr-small">
                                    <div class="horizontal-box">
                                        <label class="horizontal-box-name">Адрес электронной почты</label>
                                        <div class="horizontal-box-input"><input type="email" name="email" class="form-control" value="<?php echo $email; ?>"/></div>
                                    </div>
                                    <?php if(Config::getInstance()->get('captcha')){ ?>
                                    <hr class="hr-small">
                                    <div class="horizontal-box-captcha">
                                        <label class="horizontal-box-name-captcha">Подтвердите что Вы не робот</label>
                                        <div class="horizontal-box-input g-recaptcha" data-sitekey="<?=Config::getInstance()->get('site_key')?>"></div>
                                    </div>
                                    <?php } ?>
                                    <hr class="hr-small">
                                    <p>*создавая аккаунт Вы подтверждаете своё согласие с <a href="" target="_blank">нашими правилами</a>.</p>
                                    <input type="submit" name="submit" class="btn little-btn bc-g" value="Создать аккаунт" />
                                </form>
                                
                                <?php } ?>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>