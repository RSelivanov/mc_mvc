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
                                
                                <?php if(User::isGuest()){ echo 'Вы не авторизированы !'; }else{ ?>
                                <label class="horizontal-box-name fl-n f-bold">Пополнить баланс</label>
                                <form action="" method="post">
                                    <hr class="hr-small mt-0">
                                    
                                    <div class="horizontal-box">
                                        
                                        <div class="horizontal-box-name"><input type="number" name="moneypay" class="form-control" value="<?=Config::getInstance()->get('min_pay')?>"/></div>
                                         <input type="submit" name="payment" class="btn little-btn bc-g fl-r mr-3" value="Поплнить" />
                                    </div>

                                   
                                </form>
                                
                                <?php } ?>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>