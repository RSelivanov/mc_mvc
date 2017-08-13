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
                                
                                <div id="warning" class="c-r"></div>
                                
                                <form enctype="multipart/form-data" action="" method="post">
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
                                        <textarea name="message" id="message" class="form-control" rows="4" onblur="checkTextArea(this); return false;"><?=$message?></textarea>
                                    </div>
                                    <hr class="hr-small">
                                    <input type="file" name="guest_file" id="guest_file" style="display: inline; height: 30px;">
                                    <?php if($edit_message_button == false){?>
                                    <input type="submit" name="new_message" value="Отправить" class="ml-3 btn very-little-btn bc-b mr-3">
                                    <?php }else{ ?>
                                    <input type="hidden" name="update_row_id" value="<?=$message_id?>"><input type="submit" name="new_message" value="Сохранить" class="ml-3 btn very-little-btn bc-g mr-3">
                                    <?php } ?>
                                    <b href="" id="preview" class="ml-3 btn very-little-btn bc-r mr-3">Предпросмотр</b>
                                </form>
                                
                                <!--Таблица предпросмотра-->
                                
                                <table id="preview_table" class="table table-responsive mt-15">
                                    <thead>
                                  <tr>
                                      <th>Date</th>
                                    <th>Name</th>
                                    <th>E-Mail</th>
                                     <!--<th>Homepage</th>-->
                                    <th>Message</th>
                                    <th>File</th>
                                  </tr>
                                </thead>
                                    <tbody>
                                        <tr class="table-success">
                                            <th id="preview_date" class="f-12 table-success">.</th>
                                            <td id="preview_username" class="f-12">.</td>
                                            <td id="preview_email" class="f-12">.</td>
                                            <!--<td class="f-14">4</td>-->
                                            <td id="preview_message" class="f-12">.</td>
                                            <td id="preview_file" class="f-12">.</td>
                                        </tr>
                                   </tbody>
                                </table>   
   
                                <form action="" method="post">
                                    <hr class="hr-small">
                                    <div class="horizontal-box">
                                        <button type="submit" name="search_submit" class="ml-3 btn very-little-btn bc-g mr-3">Искать</button>
                                        <div class="horizontal-box-input"><input type="text" name="search_text" class="form-control" value=""/></div>
                                    </div> 
                                    <hr class="hr-small">
                                </form>

                                <!--Таблица гостевой книги-->
                                
                                <table class="table table-striped mt-15 table-responsive" style="width: 100%">
                                <thead>
                                  <tr>
                                      <th>
                                        <a href="/guestbook/<?=$page?>/<?=$search?>/date/<?=Guestbook::reversOrder($order)?>">Date</a>
                                    </th>
                                    <th>
                                        <a href="/guestbook/<?=$page?>/<?=$search?>/username/<?=Guestbook::reversOrder($order)?>">Name</a>
                                    </th>
                                    <th> 
                                        <a href="/guestbook/<?=$page?>/<?=$search?>/email/<?=Guestbook::reversOrder($order)?>">E-Mail</a>
                                    </th>
                                     <!--<th>Homepage</th>-->
                                    <th>Message</th>
                                    <th>File</th>
                                    <?php if(!User::isGuest()){ echo '<th>Edit</th>'; }?>
                                    <?php if(!User::isGuest()){ echo '<th>Del</th>'; }?>
                                  </tr>
                                </thead>
                                <tbody>
                                
                                <?php   if($messages_guest_list != false){ 
                                foreach ($messages_guest_list as &$message){ ?>
                                    <tr style="background: #f9f9f9;">
                                        <th class="f-12"><?=$message['date']?></th>
                                        <td class="f-12"><?=$message['username']?></td>
                                        <td class="f-12"><?=$message['email']?></td>
                                        <!--<td class="f-14"><?=$message['homepage']?></td>-->
                                        <td class="f-12"><?=$message['message']?></td>
                                        <td class="f-12"><a href="<?=Config::getInstance()->get('path_files').$message['file']?>"><?=$message['file']?></a></td>
                                        <?php if(!User::isGuest()){ ?> <td class="f-13"><form action="" method="post"><input type="hidden" name="row_id" value="<?=$message['id']?>"><input type="submit" name="edit_message" value="Edit" class="ml-3 btn very-little-btn bc-g mr-3"></form></td><?php ; }?>
                                        <?php if(!User::isGuest()){ ?> <td class="f-13"><form action="" method="post"><input type="hidden" name="row_id" value="<?=$message['id']?>"><input type="submit" name="delete_message" value="Del" class="ml-3 btn very-little-btn bc-r mr-3"></form></td><?php ; }?>
                                    </tr>
                                <?php } } ?>
                                
                                </tbody>
                              </table>
                                
                                <?php
                                $pervpage = '';
                                $nextpage = '';
                                $page2left = '';
                                $page1left = '';
                                $page2left = '';
                                $page2right = '';
                                $page1right = '';

                                // Проверяем нужны ли стрелки назад 
                                if ($page != 1) $pervpage = '<a href=/guestbook/1/'.$search.'/'.$key.'/'.$order.'> << </a>'
                                . '<a href=/guestbook/'. ($page - 1) .'/'.$search.'/'.$key.'/'.$order.'> < </a>'; 

                                // Проверяем нужны ли стрелки вперед 
                                if ($page != $pagination['total_pages']) $nextpage = ' <a href= /guestbook/'. ($page + 1) .'/'.$search.'/'.$key.'/'.$order.'>></a> 
                                                                   <a href= /guestbook/' .$pagination['total_pages'].'/'.$search.'/'.$key.'/'.$order. '>>></a>'; 

                                // Находим две ближайшие станицы с обоих краев, если они есть 
                                if($page - 2 > 0) $page2left = ' <a href= /guestbook/'. ($page - 2) .'/'.$search.'/'.$key.'/'.$order.'>'. ($page - 2) .'</a> | '; 
                                if($page - 1 > 0) $page1left = '<a href= /guestbook/'. ($page - 1) .'/'.$search.'/'.$key.'/'.$order.'>'. ($page - 1) .'</a> | '; 
                                if($page + 2 <= $pagination['total_pages']) $page2right = ' | <a href= /guestbook/'. ($page + 2) .'/'.$search.'/'.$key.'/'.$order.'>'. ($page + 2) .'</a>'; 
                                if($page + 1 <= $pagination['total_pages']) $page1right = ' | <a href= /guestbook/'. ($page + 1) .'/'.$search.'/'.$key.'/'.$order.'>'. ($page + 1) .'</a>'; 

                                // Вывод меню 
                                echo $pervpage.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$nextpage; 
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>