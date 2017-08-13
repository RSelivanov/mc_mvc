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
                                
                                <div class="t-center f-bold">Transfer</div>
                                <br>

                                <?php
                                
                                $transfer = new Transfer();
                                $mass = $transfer->getData();
                                
                                //var_dump($mass);
                                
                                foreach ($mass as $value) {
                                //echo $value['email'].' '.$value['name'].' '.$value['password'].' '.$value['money'].'</br>';  
                                echo $transfer->register($value['name'], $value['email'], $value['password'], $value['money']);
                                }
                                
                                
                                
                                ?>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
