<?php include ROOT . '/views/layouts/header.php'; ?>
<!--
        <div class="jumbotron homepage-opening">
            <div class="container">
                <div class="row text-center">
                    <h1 class="head">MyKubatura</h1>
                    <h2 class="leader" ><a href="URL" style="color:white">vk.com/mykubatura</a></h2>
                    <br />
                    <center><a class="btn btn-huge btn-info btn-glow" href="/MyKubatura.exe">Лаунчер</a></center>
                </div>
            </div>
        </div>
-->
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
                        $Secondmenu ->actionIndex('general');
                        ?>
                         <?php   if($newslist != false){ 
                                foreach ($newslist as &$news){ ?>
                                
                        <div class="content-box mt-15 p-15">
                                <div class="post-wrapper">
                                    <a href="/user/<?=$news['name']?>"><img class="post-image shadow" src="/skin/<?=$news['name']?>/head64" alt="avatar"></a>
                                    <div class="post-header-info">
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
                        
                        <?php } } ?>
                        

                    </div>
                </div>
            </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>