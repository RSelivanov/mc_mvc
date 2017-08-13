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
                                
                                <div class="t-center f-bold">С этой страницы вы сможете проголосовать за проект</div>
                                <br>
				<div class="row">
                                    <div class="col-md-3">
                                        <div class="well br-0">
                                            <h4 class="server-name-card t-center">Mс-Servera</h4>
                                            <a href="http://mc-servera.ru/vote/67844" target="_blank" class="btn btn-block middle-btn mb-15 bc-b">Голосовать</a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="well br-0">
                                            <h4 class="server-name-card t-center">Minecraftrating</h4>
                                            <a href="http://minecraftrating.ru/vote/24929/" target="_blank" class="btn btn-block middle-btn mb-15 bc-b">Голосовать</a>
                                    </div>
                                    </div>	
                                    <div class="col-md-3">
                                        <div class="well br-0">
                                            <h4 class="server-name-card t-center">Mс-Top</h4>
                                            <a href="http://mctop.su/vote/4303" target="_blank" class="btn btn-block middle-btn mb-15 bc-b">Голосовать</a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="well br-0">
                                            <h4 class="server-name-card t-center">TopCraft</h4>
                                            <a href="https://topcraft.ru/servers/7346/servers/" target="_blank" class="btn btn-block middle-btn mb-15 bc-b">Голосовать</a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="well br-0">
                                            <h4 class="server-name-card t-center">MCHEAD</h4>
                                            <a href="http://mchead.ru/server/1519546/" target="_blank" class="btn btn-block middle-btn mb-15 bc-b">Голосовать</a>
                                        </div>
                                    </div>
				</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
