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
                                        <th>Игрок</th>
                                        <th>Администратор</th>
                                        <th>Причина</th>
                                        <th>Разбан</th>
                                      </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                    //Выводим игроков онлайн
                                    if($banlist != false){ 
                                    foreach ($banlist as &$ban){ 
                                        if($ban['expires']==0){$bansexpires = "<p class='c-r f-bold'>Перманентно</p>";}else{$bansexpires = date("d.m.Y H:i",($ban['expires']/1000));}
                                        ?>
                                      <tr>
                                          <td><a href="/user/<?=$ban['name']?>" class=""><img class="userpage-achievements-img" src="/skin/<?=$ban['name']?>/head32" title="<?=$ban['name']?>"><p class="banlist-name"><?=$ban['name']?></p></a></td>
                                        <td><a href="/user/<?=$ban['banner']?>" class=""><img class="userpage-achievements-img" src="/skin/<?=$ban['banner']?>/head32" title="<?=$ban['banner']?>"><p class="banlist-name"><?=$ban['banner']?></p></a></td>
                                        <td><p><?=$ban['reason']?></p></td>
                                        <td><?=$bansexpires?></td>
                                      </tr>
                                    <?php }} ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
