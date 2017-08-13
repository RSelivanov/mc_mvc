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
                                        <label class="horizontal-box-name">Никнейм или адрес электронной почты</label>
                                        <div class="horizontal-box-input"><input type="text" name="nameoremail" class="form-control" value="<?php echo $nameoremail; ?>"/></div>
                                    </div>
                                    <hr class="hr-small">
                                    <div class="horizontal-box-captcha">
                                        <label class="horizontal-box-name-captcha">Подтвердите что Вы не робот</label>
                                        <div class="horizontal-box-input g-recaptcha" data-sitekey="6Ld_5SQUAAAAAAmo67SI6z_jYcPfRQGeCjGpjjNJ"></div>
                                    </div>
                                    <hr class="hr-small">
                                    <input type="submit" name="submit" class="btn little-btn bc-g" value="Сбросить пароль" />
                                </form>
                                
                                <?php } ?>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>