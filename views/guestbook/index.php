<?php include ROOT . '/views/layouts/header.php'; ?>

            <div class="container">
                <div class="row">
                      
                    <?php
                    //Подключаем Бар
                    $BarController = new BarController;
                    $BarController ->actionIndex();
                    ?>
                 
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <div class="transparent-box">
                        <div class="content-box mt-15">
                            <div class="content-wrapper">
                                
                                <div id="warning" class="c-r"></div>
                                
                                <form class="post-form" enctype="multipart/form-data" action="" method="post">
                                    <hr class="hr-small mt-0">
                                    <div class="horizontal-box">
                                        <label class="horizontal-box-name">User Name<span class="c-r">*</span></label>
                                        <div class="horizontal-box-input"><input type="text" name="username" id="username" class="form-control" value="<?=$username?>" onblur="checkUserName(this); return false;"/></div>
                                    </div>
                                    <hr class="hr-small">
                                    <div class="horizontal-box">
                                        <label class="horizontal-box-name">E-mail<span class="c-r">*</span></label>
                                        <div class="horizontal-box-input"><input type="email" name="email" id="email" class="form-control" value="<?=$email?>" onblur="checkEmail(this); return false;"/></div>
                                    </div>
                                    <hr class="hr-small">
                                    <div class="horizontal-box">
                                        <label class="horizontal-box-name">Homepage</label>
                                        <div class="horizontal-box-input"><input type="url" name="homepage" id="homepage" class="form-control" value="<?=$homepage?>" onblur="checkUrl(this); return false;"/></div>
                                    </div>
                                    <?php if(Config::getInstance()->get('captcha')){ ?>
                                    <hr class="hr-small">
                                    <div class="horizontal-box-captcha">
                                        <label class="horizontal-box-name-captcha">CAPTCHA<span class="c-r">*</span></label>
                                        <div class="horizontal-box-input g-recaptcha" data-sitekey="<?=Config::getInstance()->get('site_key')?>"></div>
                                    </div>
                                    <?php } ?>
                                    <hr class="hr-small">
                                    <div class="form-group">
                                        <textarea name="message" id="message" class="form-control" rows="4" onblur="checkTextArea(this); return false;"><?=nl2br($message)?></textarea>
                                    </div>
                                    <hr class="hr-small">
                                    <input type="file" name="guest_file" id="guest_file" style="display: inline; height: 30px;">
                                    <input type="submit" name="new_message" value="Отправить" class="ml-3 btn very-little-btn bc-b mr-3">
                                    <b href="" id="preview" class="preview ml-3 btn very-little-btn bc-r mr-3">Предпросмотр</b>
                                </form>
                            </div>
                        </div>
                        
                        <!--Предпросмотр-->
                        <div id="preview_area"></div>
                        
                     </div>
                        
                        
                        
                        <!--Поиск-->
                        <div class="content-box mt-15">
                            <div class="content-wrapper">
                                <form action="" method="post">
                                    <div class="horizontal-box">
                                        <button type="submit" name="search_submit" class="ml-3 btn very-little-btn bc-g mr-3">Искать</button>
                                        <div class="horizontal-box-input"><input type="text" name="search_text" class="form-control" value=""/></div>
                                    </div> 
                                </form>
                            </div>
                        </div>
                        
                        <!--Сортировка-->
                        <div class="content-box mt-15">
                            <div class="content-wrapper">
                                <a href="/guestbook/<?= Guestbook::generateLink('sorting', $page, $search, 'date', $order)?>" class="ml-3 btn very-little-btn bc-j mr-3">по дате</a>
                                <a href="/guestbook/<?= Guestbook::generateLink('sorting', $page, $search, 'username', $order)?>" class="ml-3 btn very-little-btn bc-j mr-3">по имени</a>
                                <a href="/guestbook/<?= Guestbook::generateLink('sorting', $page, $search, 'email', $order)?>" class="ml-3 btn very-little-btn bc-j mr-3">по емейлу</a>
                            </div>
                        </div>
                        
                        <!--Таблица гостевой книги-->
                        <?php   if($messages_guest_list != false){ 
                        foreach ($messages_guest_list as &$message){ ?>
                        <div class="transparent-box">  
                            <div class="content-box mt-15 p-15" id="message_box">
                                <div class="post-wrapper">
                                    <a href="/user/<?=$message['username']?>"><img class="post-image shadow" src="/skin/<?=$message['username']?>/head64" alt="avatar"></a>
                                    <div class="post-header-info">
                                        <a href="" id="message_delete" data-id = "<?=$message['id']?>"><i class="fa fa-times c-r ml-5" style="float: right;"></i></a>
                                        <a href="" id="get_edit_area"  data-id = "<?=$message['id']?>"><i class="fa fa-pencil c-g" style="float: right;"></i></a>
                                        <a href="/user/<?=$message['username']?>" class="post-author username"><?=$message['username']?></a>
                                        [ <span class="post-author ml-5 email"><?=$message['email']?></span> ]
                                        <?php if(!empty($message['homepage'])){?> ( <span class="post-author ml-5 homepage"><a href="<?=$message['homepage']?>" class="post-author"><?=$message['homepage']?></a></span> ) <?php } ?><p class="post-date"><?=$message['date']?></p>
                                    </div>
                                </div>
                                <div class="post-text">
                                    <?=nl2br($message['message'])?>
                                </div>
                                <hr>
                                <?php if(!empty($message['file'])){?> File: <a href="<?=Config::getInstance()->get('path_files').$message['file']?>"><?=$message['file']?></a> <?php } ?>
                             </div>
                         </div> 
                        <?php } } ?>
                        
                        <!--Пагинатор-->
                        <div class="text-center">
                            <ul class="pagination">
                                <?php
                                $pagination_draw = Guestbook::pagesDrawLink($page, $pagination, $search, $key, $order);

                                for ($i = 0; $i < count($pagination_draw); $i++) {
                                    echo $pagination_draw[$i];
                                }
                                ?>
                            </ul>  
                        </div>
                    </div>
                </div>
            </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>