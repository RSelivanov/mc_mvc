                  <?php if(!User::isGuest()){ ?>       
                        <div class=" content-box mt-15">
                            <nav class="second-menu">
                                <ul>
                                    <li class=""><a href="/user/<?=$user['name']?>">Страница</a></li>
                                    <li class=""><a href="/view">Вид</a></li>
                                </ul>
                            </nav>
                        </div>
                    <?php } ?>