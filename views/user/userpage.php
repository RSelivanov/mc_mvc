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
                        $Secondmenu ->actionIndex('user');
                        ?>
                        
                       <div class="content-box mt-15">
                            <div class="content-wrapper">
                                
                                <?php if(User::isGuest()){ echo 'Вы не авторизированы !'; }else{ ?>
                                
                                <img class="userpage-img" src="/skin/<?=$user['name']?>/head128" alt="avatar">
                                <div class="userpage-right-box-wrapper">
                                    <div class="userpage-row-1">
                                        <div class="userpage-name f-bold"><?=$user['name']?></div> 
                                        <div class="userpage-status c-r">offline</div> 
                                    </div>
                                    <div class="hr"></div>
                                    <div class="userpage-row-2">
                                        <div class="f-bold t-center mt-15 mb-15">Уровень 0 <span class="f-regular f-14">( 0 очков )</span></div> 
                                        <div class="userpage-process-line-cont"><div class="userpage-process-line-bar bc-j" style="width: 0%;"></div></div>
                                    </div>
                                    <div class="hr"></div>   
                                </div>
                                
                                <div class="f-bold mt-15 f-14">Достижения</div> 
                                <div class="mt-15 userpage-achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                   <img class="userpage-achievements-img" src="/template/images/achievements.png" alt="achievements">
                                </div> 
                                <?php if($user['id'] == User::getSession()){ ?>
                                <div class="hr mt-15 mb-15"></div>  
                                <div class="horizontal-box mt-15 ">
                                        <label class="horizontal-box-name">Передайте ссылку друзьям и получите бонус</label>
                                        <div class="horizontal-box-input"><input type="text" name="referral" class="form-control" value="http://mykubatura.ru/referral/<?=$user['name']?>"></div>
                                </div>
                                
                                <?php }  ?>
                                
                            </div>
                        </div>
                        
                         <?php if($user['id'] == User::getSession()){ ?>
                        <div class="content-box mt-15 p-15">
                            <form action="" method="post" role="form" enctype="multipart/form-data">
                                <p>Используейте коды: [b]text[/b] - Жирный, [u]text[/u] - Подчеркнутый, [i]Text[/i] - Наклонный, [li]Item[/li] - Список</p>
                                <div class="form-group">
                                    <textarea name="content" class="form-control" rows="4"></textarea>
                                </div>
                                <button type="submit" name="submit" class="ml-3 btn very-little-btn bc-g mr-3">Отправить</button>
                            </form>
                        </div>
                        <?php } ?>
                        
                        <?php   if($newslist != false){ 
                                foreach ($newslist as &$news){ ?>
                                
                        <div class="content-box mt-15 p-15">
                                <div class="post-wrapper">
                                    <a href="/user/<?=$news['name']?>"><img class="post-image shadow" src="/skin/<?=$news['name']?>/head64" alt="avatar"></a>
                                    <div class="post-header-info">
                                         <?php if($user['id'] == User::getSession()){ ?>
                                        <a href="#" onclick="document.getElementById('deleteform<?=$news['id']?>').submit(); return false;">
                                            <i class="fa fa-times c-r" style="float: right;"></i>
                                            <form method="post" id="deleteform<?=$news['id']?>">
                                                <input type="hidden" name="delete" value="<?=$news['id']?>">
                                            </form>
                                        </a>
                                        <?php }  ?>
                                        <a href="/user/<?=$news['name']?>" class="post-author"><?=$news['name']?></a>
                                        <p class="post-date"><?=$news['date']?></p>
                                    </div>
                                </div>
                                    <div class="post-text">
                                    <?=nl2br(Text::bbcode($news['content']))?>
                                    </div>
                                <hr>
                                <a href="#" onclick="document.getElementById('likeform<?=$news['id']?>').submit(); return false;" class="post-like">
                                    <i class="fa fa-heart"></i>
                                    <span class="post-like-link">Нравится</span>
                                    <span class="post-like-count"><?=$news['likes']?></span>
                                    <form method="post" id="likeform<?=$news['id']?>">
                                        <input type="hidden" name="like" value="<?=$news['id']?>">
                                    </form>
                                </a>
                        </div>
                        
                                <?php } } } ?>
                    </div>
                </div>
            </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>