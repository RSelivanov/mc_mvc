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
 <div class="container">	
	<table style="text-align: center; width:95%;">
			<tr>
				<td style="text-align: center;"><h4 class="text-info">Полезные статьи на
					<a href="http://ru.minecraftwiki.net" target="_blank">ru.minecraftwiki.net</a></h4></td>
			</tr>
			<tr>
				<td style="text-align: center;">
					<div class="btn-group" style="text-align:center">
						<a class="btn btn-default btn-success" href="http://ru.minecraftwiki.net/%D0%91%D0%BB%D0%BE%D0%BA%D0%B8" target="_blank">Блоки</a>
						<a class="btn btn-default btn-info" href="http://ru.minecraftwiki.net/%D0%95%D0%B4%D0%B0" target="_blank">Еда</a>
						<a class="btn btn-default btn-success" href="http://ru.minecraftwiki.net/%D0%9C%D0%B0%D1%82%D0%B5%D1%80%D0%B8%D0%B0%D0%BB%D1%8B" target="_blank">Материалы</a>
						<a class="btn btn-default btn-info" href="http://ru.minecraftwiki.net/%D0%98%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B" target="_blank">Инструменты</a>
						<a class="btn btn-default btn-success" href="http://ru.minecraftwiki.net/%D0%9E%D1%80%D1%83%D0%B6%D0%B8%D0%B5" target="_blank">Оружие</a>
						<a class="btn btn-default btn-info" href="http://ru.minecraftwiki.net/%D0%91%D1%80%D0%BE%D0%BD%D1%8F" target="_blank">Броня</a>
						<a class="btn btn-default btn-success" href="http://ru.minecraftwiki.net/%D0%9A%D1%80%D0%B0%D1%84%D1%82" target="_blank">Рецепты крафта</a>
					</div>
				</td>
			</tr>
		</table>
		<p></p>

		<p>После постройки дома вам непременно понадобится защитить его от вандалов и грабителей<br />
		   Приватный регион - это территория в форме прямоугольника, все кубы в области которой может изменять только владелец региона. Таким образом можно защитить собственные постройки от вандалов и грабителей.
		</p>

		<div class="panel-group" id="accordion2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
							<i class="glyphicon glyphicon-folder-open"></i>&nbsp&nbsp<strong>Поэтапная схема создания приватного региона</strong>
						</a>
					</h4>
				</div>
				
				<div id="collapseOne" class="panel-collapse collapse in">
					<div class="panel-body">
						<ol>
							<li>Необходимо создать деревянный топор либо получить его при помощи команды
								<strong class="text-error">//wand</strong></li>
							<li>Вооружаемся топором и щелкаем левой кнопкой мыши правый верхний угол
								<strong class="text-error">(1)</strong> затем нажатием правой кнопки мыши выделяем левый нижний угол
								<strong class="text-error">(2)</strong> площади региона (Кубоида).<br />
								<img src="/template/images/tmp/cuboid.png" width="200" height="200" alt="Кубоид" />
							</li>
							<li>Открываем чат (лат. T)
							<li>Вводим в чате команду<br />
								<strong class="text-error">/rg claim [название_региона] [имя_владельца]</strong> (или нескольких владельцев, ники через пробел)<br />
								Вот собственно и всё, приватная территория создана.<br />
								Всего разрешается иметь не более 1го приватного региона.
							</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
							<i class="glyphicon glyphicon-folder-open"></i><strong>&nbsp&nbsp Прочие команды для настройки региона</strong>
						</a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							<li><strong class="text-error">/rg list</strong> - список всех регионов</li>
							<li><strong class="text-error">/rg list .</strong> - список своих регионов</li>
							<li><strong class="text-error">/rg remove [имя_региона]</strong> - удаление региона</li>
							<li>
								<strong class="text-error">/rg addowner [имя_региона] [имя_игрока]</strong> - добавление владельца региона
							</li>
							<li>
								<strong class="text-error">/rg removeowner [имя_региона] [имя_игрока]</strong> - удаление владельца региона
							</li>
							<li>
								<strong class="text-error">/rg addmember [имя_региона] [имя_игрока]</strong> - добавление "жителя" региона
							</li>
							<li>
								<strong class="text-error">/rg removemember [имя_региона] [имя_игрока]</strong> - удаление "жителя" региона
							</li>
							<li>
								<strong class="text-error">/rg flag [имя_региона] pvp deny</strong> - запрещает пвп режим на указанном регионе
							</li>
							<li>
								<strong class="text-error">/rg flag [имя_региона] pvp allow</strong> - разрешает пвп режим на указанном регионе
							</li>
							<li>
								<strong class="text-error">/rg flag [имя_региона] lava-fire deny</strong> - отключает повреждения от лавы в регионе
							</li>
							<li>
								<strong class="text-error">/rg flag [имя_региона] lava-flow deny</strong> - отключает "растекание" лавы в регионе
							</li>
							<li>
								<strong class="text-error">/rg flag [имя_региона] creeper-explosion deny</strong> - отключает повреждение блоков от взрывов криперов
							</li>
							<li>
								<strong class="text-error">/rg flag [имя_региона] potion-splash deny</strong> - отключает взрывы зелий
							</li>
							<li>
								<strong class="text-error">/rg flag [имя_региона] tnt deny</strong> - отключает возможность использования динамита
							</li>
							<li>
								<strong class="text-error">/rg flag [имя_региона] enderman-grief deny</strong> - отключает воровство блоков эндерманами
							</li>
							<li>
								<strong class="text-error">/rg flag [имя_региона] mob-spawning deny</strong> - отключает спаун мобов (и враждебных и нейтральных)
							</li>
							<li>
								<strong class="text-error">/rg flag [имя_региона] fire-spread deny</strong> - отключает распространение огня в регионе
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
							<i class="glyphicon glyphicon-folder-open"></i><strong>&nbsp&nbsp Телепортация и прочие полезные команды, которые облегчат вам игру</strong>
						</a>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse"">
					<div class="panel-body">
						<ul>
							<li>
								<strong class="text-error">/sethome</strong> - устанавливает точку мгновенного перемещения по команде
								<strong class="text-error">/home</strong></li>
							<li>
								<strong class="text-error">/home</strong> - вернуться в точку мгновенного перемещения, установленную по команде
								<strong class="text-error">/sethome</strong></li>
							<li>
								<strong class="text-error">/home [ник_другого_игрока]</strong> - переместится в гости к игроку
							</li>
							<li>
								<strong class="text-error">/spawn</strong> - возвращает вас в начальную точку игрового мира (respawn)
							</li>
							<li>
								<strong class="text-error">/warp [имя_варпа]</strong> - перемещает игрока в точку, заранее созданную на сервере
							</li>
							<li>
								<strong class="text-error">/ignore [ник]</strong> - добавить игрока в список игнорируемых
							</li>
							<li>
								<strong class="text-error">/unignore [ник]</strong> - удалить игрока из списка игнорируемых
							</li>
							<li><strong class="text-error">/ignorelist</strong> - список игнорируемых игроков</li>
							<li><strong class="text-error">/time</strong> - выдает текущее время на сервере</li>
							<li><strong class="text-error">/list</strong> - посмотреть, кто сейчас в сети</li>
							<li>
								<strong class="text-error">/msg [ник] [сообщение]</strong> - отправить личное сообщение игроку в сети
							</li>
							<li>
								<strong class="text-error">/r [сообщение]</strong> - ответить на последнее личное сообщение
							</li>
						</ul>
					</div>
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