<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>MyKubatura</title>
        
        <link href="/template/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        
        <link href="/template/css/bootstrap.css" rel="stylesheet">
        <!--
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        -->
        <link href="/template/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        
        <link href="/template/css/style.css" rel="stylesheet">
        
        <script type="text/javascript" src="//vk.com/js/api/openapi.js?146"></script>
        
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter44225964 = new Ya.Metrika({
                    id:44225964,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/44225964" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
    </head>
    <body>

        <?php if (isset($errors) && is_array($errors)): ?>
        <div class="notice">
            <ul>
            <?php foreach ($errors as $error): ?>
                <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
            </ul>
        </div>  
        <?php endif; ?>
        
        <div id="intro-dm" class="shadow">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">    
                        <a class="navbar-brand" href="/">
                            <img class="logo" src="/template/images/logo.png" alt="<?=Config::getInstance()->get('project_name')?>">
                        </a>
                        <nav class="main-menu">
                            <ul>
                                <li class=""><a href="/">Главная</a></li> 
                                <li class=""><a href="/guestbook/1/0/id/desc">Гостевая книга</a></li> 
                                <li class="dropdown">
                                    <a href="#">Серверы</a>
                                    <div class="dropdown_menu" style="display: none;">
                                        <?php $servers = Server::getServers(); 
                                        foreach ($servers as &$server){?>
                                        <a href="/info/<?=$server['name']?>"><span class="menu-server-icon" style="background-color: #E67E22;">P</span> <?=$server['name']?></a>
                                        <?php } ?>
                                    </div>
				</li>
                                <li class=""><a href="https://mykubatura.trademc.org/" target="_blank">Донат</a></li>
                                <li class=""><a href="/staticpage/rules">Правила</a></li>
                                <li class=""><a href="/staticpage/vote">Голосовать</a></li>
                               
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>