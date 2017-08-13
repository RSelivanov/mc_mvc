<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>MyKubatura</title>
	<!-- Bootstrap core CSS -->
    <link href="/template/css/bootstrap.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
    <!-- FontAwesome CSS -->
	<link href="/template/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- MyMC CSS -->
	<link href="/template/css/mymc.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>



   
</head>
<div id="intro-dm">
 <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
                    <a class="navbar-brand" href="/">MyKubatura</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/"><i class="fa fa-home"></i> На главную</a></li>
                        <li><a href="/rules.php"><i class="fa fa-info-circle"></i> Правила</a></li>
                        <li><a href="/vote.php"><i class="fa fa-check"></i> Голосуй</a></li>
			<li><a href="/minimap.php"><i class="fa fa-binoculars"></i> Миникарта</a></li>		
                        <li><a href="/register.php"><i></i> Регистрация</a></li>
                        <li><a href="/login.php"><i></i> Войти</a></li>
						
						
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
			<!-- /.container -->
</div>
</nav>
        <!-- Big opening-->
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
        <!-- /Big opening -->
            <div class="container">
                <div class="row text-center mc-items">
                    <div class="col-md-3">
                        <div class="white-block" style="margin-bottom: 21px;">
                            <div class="l-block-title">Топ игроков</div>
                            <iframe title='Топ активных игроков' src='http://mchead.ru/server/1519546/widgets/topplayers/?count=10' frameborder='0' width='100%' height='260px'></iframe>
                        </div>
                        <div class="white-block">
                            <div class="l-block-title">Мониторинг</div>
                            <div class="server-list-main">
                                <div class="server-list-name">Polonium</div>
                                <div class="server-list-wrap">
                                    <?php
                                    $m = new MinecraftServer();
                                    $s = $m->getq('46.105.47.134', 3016);
                                    ?>
                                    <div class="server-list-play"><?=$s['online']?></div>
                                    <div class="server-list-cont" data-original-title="Онлайн сервера: 16"><div class="server-list-bar" style="width: <?=($s['online']*$s['slots'])/100?>%;"></div></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="white-block" style="height: 340px;">
                            <div class="icon">
                                <img src="/template/images/tmp/swords.png" />
                            </div>
                            <h2>Донат</h2>
                            <p>Стоит посмотреть какие цены у нас в магазине, я думаю ты удивишься, цены низкие и честные.
                                <br />
                                <a href="https://mykubatura.trademc.org/" class="btn btn-info btn-round">Посмотреть &raquo;</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="white-block" style="height: 340px;">
                            <div class="icon">
                                <img src="/template/images/tmp/chest.png" />
                            </div>
                            <h2>Помощь</h2>
                            <p>Здесь ты сможешь узнать всю необходимую информацию об игре.<br>
                                <br />
                                <a href="/help.php" class="btn btn-info btn-round">Посмотреть &raquo;</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="white-block" style="height: 340px;">
                            <div class="icon">
                                <img src="/template/images/tmp/diamond.png" />
                            </div>
                            <h2>Халява</h2>
                            <p>Информация о бесплатных денежках, голосования и реферальные системы, которые на вашей стороне.
                                <br />
                                <a href="/free.php" class="btn btn-info btn-round">Посмотреть &raquo;</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-9" style="margin-top: 21px;">
                        <div class="l-block-title">Текущий онлайн</div>
                        <iframe title="Игроки онлайн" src="http://mchead.ru/server/1519546/widgets/playersonline/?count=30" frameborder="0" width="100%" height="285px"></iframe>
                    </div>

                </div>
            </div>
 <hr>
 <div class="container"
	<footer>
		<div class="row">
			<div class="col-lg-12">
				<ul class="nav nav-pills bottom">
					<li role="presentation"><a href="rules.php">Правила</a></li>
					<li class="pull-right">&copy; 2017 MyKubatura</li>
				</ul>
			</div>
            <div class="col-lg-12">
                <ul class="nav nav-pills bottom">
                    <!-- Yandex.Metrika informer -->
                    <li class="pull-right">
                    <a href="https://metrika.yandex.ru/stat/?id=44225964&amp;from=informer"
                    target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/44225964/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
                    style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="00000" data-lang="ru" /></a>
                    </li>
                    <!-- /Yandex.Metrika informer -->
                </ul>
            </div>
		</div>
	</footer>
      </div>