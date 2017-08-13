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
                                <img class="w-100" src="/template/images/slide.png" alt="img"> 
                                
                                <p class="mt-15">Polonium - этот сервер сочетает в себе индустриальные технологии и древнюю магию. 
                                    Вам предстоит столкнуться с загадочными существами из древних миров, посетить сумеречный лес, 
                                    побывать в хердкорных данжах. А так же, обустроить свой дом, провести электричество и спроектировать свой первый ядерный реактор.</p>
                                
                                <div class="f-bold mt-15 f-14">Игроки онлайн</div>
                                
                                <div class="mt-15 userpage-achievements">
                                   
                                    <?php 
                                    //Выводим игроков онлайн
                                    if(Config::getInstance()->get('servers_status')){
                                        if($players != false){ 
                                            foreach ($players as &$player){ ?>
                                            <a href="/user/<?=$player?>" class="">
                                                <img class="userpage-achievements-img" src="/skin/<?=$player?>/head32" alt="<?=$player?>" title="<?=$player?>">
                                            </a>
                                    <?php } } }?>
                                    
                                </div>
                                <!--<div class="hr"></div>-->
                                <div class="f-bold mt-15 mb-15 f-14">Особенности</div>
                                <ul>
                                    <li>Убрано разрушение от взрыва блоков (только урон).</li>
                                    <li>Убрано распространение огня.</li>
                                    <li>Карта ограничена до 4000 блоков в диаметре.</li>
                                    <li>Только PVE режим.</li>
                                    <li>Ограничение на установку некоторых механизмов.</li>
                                    <li>Добрые криперы которые любят печеньки.</li>
                                    <li>Страшная тюрьма для гриферов.</li>
                                </ul>
                                 
                                <div class="f-bold mt-15 mb-15 f-14">Моды</div>
                                <ul>
                                    <li>Thaumcraft.</li>
                                    <li>Thaumic Tinkerer.</li>
                                    <li>Automagy.</li>
                                    <li>Forestry.</li>
                                    <li>Chisel 2.</li>
                                    <li>IndustrialCraft2 Experimental.</li>
                                </ul>
                                
                                <div class="f-bold mt-15 mb-15 f-14">Запреты</div>
                                <ul>
                                    <li>Nuke.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
