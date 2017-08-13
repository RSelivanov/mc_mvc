<?php include ROOT . '/views/layouts/header.php'; ?>

            <div class="container">
                <div class="row">
                       
                    <?php
                    //Подключаем Бар
                    $BarController = new BarController;
                    $BarController ->actionIndex();
                    ?>
                 
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        
                        <?php
                        //Подключаем второе меню
                        $Secondmenu = new SecondmenuController;
                        $Secondmenu ->actionIndex('server');
                        ?>
                        
                        <div class="content-box mt-15">
                            <div style="border-top: 3px solid #e67e22;"></div>
                            <div class="content-wrapper">
                                
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th>Место</th>
                                        <th>Игрок</th>
                                        <th>Уровень</th>
                                      </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                    //Выводим игроков онлайн
                                    if($toplist != false){
                                    $count = 1;
                                    foreach ($toplist as &$top){ 
                                    ?>
                                      <tr>
                                        <td><?=$count?></td>
                                        <td><a href="/user/<?=$top['name']?>" class=""><img class="userpage-achievements-img" src="/skin/<?=$top['name']?>/head32" title="<?=$top['name']?>"><p class="banlist-name"><?=$top['name']?></p></a></td>
                                        <td><p><?=$top['level']?></p></td>
                                      </tr>
                                    <?php $count++; }} ?>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
