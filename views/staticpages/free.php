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
                        $Secondmenu ->actionIndex('general');
                        ?>
                        
                        <div class="content-box mt-15">
                            <div class="content-wrapper">
                                
                                <div class="f-bold">Халява</div>
                                <br>
                                
                                <li>Чтобы получить бесплатно игровую валюту, можно проголосовать на <a href="http://mchead.ru/server/1519546/">MCHEAD</a>, проголосовав тут вы получите 10 монет гарантитованно а так-же есть небольшой шанс получить 100 монет!<br>
				<li>Так-же вы можете получить 20 рублей на свой счет на сайте, всего-лишь скопировав ссылку в <a href="http://mykubatura.ru/pages/loadpage?name=profile">профиле</a>, и отправив её другу. <br>
				Как только он начнёт играть вы увидите как ваш счет изменился на 20 рублей.</li>
				</li>
                                <br>
				<div class="top5">
				</div>
				<img src="/template/images/tmp/Free.png" class="img-responsive"> 	
				<div class="top5">
				</div>
                                <br>
				<div class="row">
				<div class="col-md-4">	</div>			
					<div class="col-md-4">
						<div class="well br-0">
							<h4 class="server-name-card t-center">MCHEAD<br>Голосуй и получай деньги!</h4>
							<a href="http://mchead.ru/server/1519546/" class="btn btn-block middle-btn mb-15 bc-b">Голосовать</a>
						</div>
					</div>
				</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
