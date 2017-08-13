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
                        $Secondmenu ->actionIndex('user');
                        ?>
                        
                       <div class="content-box mt-15">
                            <div class="content-wrapper">
                                
                                <?php if(User::isGuest()){ echo 'Вы не авторизированы !'; }else{ ?>
                                
                                <div class="view-imgs">
                                    <img src="/skin/<?=$user['name']?>/front" alt="img">
                                    <img class="ml-5"src="/skin/<?=$user['name']?>/back" alt="img">
                                </div> 
                                <div class="view-right-box-wrapper">  
                                    <div class="f-bold f-14 ml-3">Скин</div>
                                    
                                    <div class="hr mt-15 mb-15"></div>
                                    
                                    <div class="horizontal-box">
                                        <div class="fl-l f-13">
                                            <div class="f-bold ml-3">Возможность устанавливать скин</div>
                                            <div class="ml-3">Доступные форматы скинов равные 64х32</div>  
                                        </div>

                                        <div class="fl-r f-13">
                                            <div class="fl-l mr-15 mt-5">Free</div>
                                            <a href="" class="btn very-little-btn bc-lg mr-3">Купить</a>
                                        </div>
                                    </div>    
                                    
                                    <div class="hr mt-15 mb-15"></div>
                                    
                                    <div class="horizontal-box">
                                        <div class="fl-l f-13">
                                            <div class="f-bold ml-3">Возможность устанавливать HD скин</div>
                                            <div class="ml-3">Доступны форматы скинов больше чем 64х32</div>  
                                        </div>

                                        <div class="fl-r f-13">
                                            <div class="fl-l mr-15 mt-5">Free</div>
                                            <a href="" class="btn very-little-btn bc-lg mr-3">Купить</a>
                                        </div>
                                    </div>
                                    
                                    <div class="hr mt-15 mb-15"></div>
                                    
                                    <div class="horizontal-box">

                                       <a href="" id="uploadSkinButton" class="ml-3 btn very-little-btn bc-b mr-3">Загрузить</a>
                                       <a href="" class="btn very-little-btn bc-lg mr-3">Скачать</a>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    <div class="f-bold f-14 ml-3 mt-25">Плащ</div>
                                    
                                    <div class="hr mt-15 mb-15"></div>
                                    
                                    <div class="horizontal-box">
                                        <div class="fl-l f-13">
                                            <div class="f-bold ml-3">Возможность устанавливать плащ</div>
                                            <div class="ml-3">Доступные форматы плащей равные 22х17</div>  
                                        </div>

                                        <div class="fl-r f-13">
                                            <div class="fl-l mr-15 mt-5">Free</div>
                                            <a href="" class="btn very-little-btn bc-lg mr-3">Купить</a>
                                        </div>
                                    </div>    
                                    
                                    <div class="hr mt-15 mb-15"></div>
                                    
                                    <div class="horizontal-box">
                                        <div class="fl-l f-13">
                                            <div class="f-bold ml-3">Возможность устанавливать HD плащ</div>
                                            <div class="ml-3">Доступны форматы плащей больше чем 22х17</div>  
                                        </div>

                                        <div class="fl-r f-13">
                                            <div class="fl-l mr-15 mt-5">Free</div>
                                            <a href="" class="btn very-little-btn bc-lg mr-3">Купить</a>
                                        </div>
                                    </div>
                                    
                                    <div class="hr mt-15 mb-15"></div>
                                    
                                    <div class="horizontal-box">
                                       <a href="" id="uploadCloakButton" class="ml-3 btn very-little-btn bc-b mr-3">Загрузить</a>
                                       <a href="" class="btn very-little-btn bc-lg mr-3">Скачать</a>
                                    </div>
                                    
                                    <div class="hiddenbox">
                                        <form id="uploadSkinInput" method="POST" action="/view"  enctype="multipart/form-data">
                                            <input type="file" name="skin_file">
                                            <input id="uploadSkinSubmit" type="submit" name="skin" value="Загрузить скин" class="btn btn-primary btn-block">
                                        </form>

                                        <form id="uploadCloakInput" method="post" action="/view"  enctype="multipart/form-data">
                                            <input type="file" name="cloak_file">
                                            <input id="uploadCloakSubmit" type="submit" name="cloak" value="Загрузить скин" class="btn btn-primary btn-block">
                                        </form>
                                    </div>     
                                </div> 
                                
                                <?php } ?>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>