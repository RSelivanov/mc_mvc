                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">                       
                        <a href="/staticpage/startgame" class="btn btn-block big-btn shadow mt-15 bc-g" role="button">Начать играть</a>
                       
                       <?php if(User::isGuest()){ ?>
                        <div class="content-box mt-15">
                            <div class="lside-head f-bold">Авторизация</div>
                            <form action="/login" method="post" class="content-wrapper">
                                <input type="text" name="nickname" class="form-control mb-15" placeholder="Никнейм" required autofocus>
                                <input type="password" name="password" class="form-control mb-15" placeholder="Пароль" required>
                                <button name="submit" class="btn btn-block middle-btn bc-b" type="submit">Войти на сайт</button>
                            </form>
                            <a href="/lostpassword/send" class="need-help">Вспомнить пароль</a>
                        </div>
                       <?php } ?>
                       
                       <?php if(!User::isGuest()){ ?>
                        <div class="content-box mt-15">
                            <div class="lside-head f-bold"><?=$user['name'];?></div>
                            <div class="content-wrapper">
                                <img class="center-block" src="/skin/<?=$user['name']?>/head64" alt="img">
                                <div class="m-profile-box center-block">
                                    <div class="m-profile-line mb-10">Уровень<span><?=$user['level']?></span></div>
                                    <div class="m-profile-line mt-10">Баланс<span><?=$user['money']?></span></div>
                                </div>
                                <a href="/user/<?=$user['name']?>" class="btn btn-block middle-btn mb-15 bc-b" type="submit">Управление</a>
                                <a href="/logout" class="btn btn-block middle-btn bc-r" type="submit">Выйти с сайта</a>
                            </div>
                        </div>
                       <?php } ?>
                       
                        <div class="content-box mt-15">
                            <div class="lside-head f-bold">Мониторинг</div>
                            <div class="content-wrapper">
                                <div class="server-list-wrap">
                                    <?php if(isset($serverInfo)){ for($i = 0; $i < count($serverInfo); ++$i) { ?>
                                    <div class="m-profile-line mt-10 mb-2">
                                        <a href="/info/<?=$servers[$i]['name']?>" class=""><i class="fa fa-info-circle"></i></a> 
                                        <a href="http://<?=$servers[$i]['ip'].':'.$servers[$i]['map_port']?>" target="_blank"><i class="fa fa-globe"></i></a> 
                                        <?=$servers[$i]['name']?> <span><?php if(!$serverInfo){echo '<span class="c-r">offline</span>';}else{echo $serverInfo[$i]['Players'].'/'.$serverInfo[$i]['MaxPlayers'];} ?></span>
                                    </div>
                                    <div class="server-list-cont <?php if(!$serverInfo){echo 'bc-red';}else{echo 'bc-dg';}?>"><div class="server-list-bar bc-g" style="width: <?=($serverInfo[$i]['Players']*$serverInfo[$i]['MaxPlayers'])/100?>%;"></div></div>
                                    <?php }} ?>
                                    <hr>
                                    <div class="m-profile-line mt-10">Общий онлайн<span><?php if(isset($serverInfo)){ echo $serverInfo[0]['Players']; }?></span></div>
                                </div>
                            </div>
                        </div>
                       
                       <div class="content-box mt-15">
                            <div class="lside-head f-bold">Вконтакте</div>
                            <div class="content-wrapper">
                                <div id="vk_groups"></div>
                                <script type="text/javascript">
                                VK.Widgets.Group("vk_groups", {mode: 0, width: "auto", height: "400"}, 144891569);
                                </script>
                            </div>
                        </div>
                    </div>    