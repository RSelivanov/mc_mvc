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
                                
                                <div class="f-bold mb-15">1. Создайте аккаунт</div>

                                <div class="f-14">На нашем сервере используется своя система авторизации, поэтому Вам необходимо пройдите простую и безопасную процедуру регистрации на нашем сайте. 
                                Перед регистрацией ознакомьтесь с <a href="/staticpage/rules" target="_blank">нашими правилами</a>.</div> 

                                <div class="">
                                    <a href="/register" class="center-block btn btn-block very-big-btn mb-15 bc-b" type="submit">Зарегистрироваться</a>
                                </div>

                                <div class="f-bold mb-15">2. Загрузите клиент</div>

                                <div class="f-14">Играть на нашем сервере можно только через наш лаунчер и наш клиен настроенный специально под наш сервер. 
                                Никаких модификаций на клиент устанавливать самостоятельно не нужно.</div> 
                                </br>
                                <div class="f-14">Для запуска игры Вам необходимо иметь установленную Oracle Java 8 на компьютере. 
                                Самую последнюю версию можно загрузить с <a href="https://java.com/ru/download/manual.jsp" target="_blank">официального сайта</a>.</div>
                                
                                
                                <div class="t-center">
                                    <a href="/kubatura/MyKubatura.exe" class="center-block btn very-big-btn mb-15 mt-20 bc-g" style="display: inline-block;" type="submit">Лаунчер для Windows</a>
                                    <a href="/kubatura/MyKubatura.jar" class="center-block btn very-big-btn mb-15 mt-20 ml-20 bc-g" style="display: inline-block;" type="submit">Для других систем</a>
                                </div>
                                
                                <div class="f-bold mb-15">3. Играйте</div>
                                
                                <div class="f-14">Когда все предыдущие этапы пройдены, Вам нужно запустить лаунчер ввести свой логин и пароль и нажать "Играть".</div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
