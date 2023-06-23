</div>           
<section style="background-color: #e7e9d3;">
    <div class="container text-center text-md-start mt-5">

        <div class="row mt-3">
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold mb-4">
                    Мы в соцсетях
                </h6>
                <p>
                    <a href="https://web.telegram.org/">
                        <img src="<?= TEMPLANE_PATH ?>/icon/tg.png" width='40px'/>
                    </a> Телеграмм
                </p>
                <p>
                    <a href="https://vk.com/">
                        <img src="<?= TEMPLANE_PATH ?>/icon/vk.png" width='40px'/>
                    </a> Вконтакте
                </p>
                <p>
                    <a href="https://www.twitter.com/">
                        <img src="<?= TEMPLANE_PATH ?>/icon/tw.png" width='40px'/>
                    </a> Твиттер
                </p>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold mb-4">
                    О компании
                </h6>
                <p>
                    <a href="<?= MAIN_PREFIX ?>/aboutus/" class="text-reset">О "Book Store"</a>
                </p>
                <p>
                    <a href="#" class="text-reset">Бонусная программа</a>
                </p>
                <p>
                    <a href="#" class="text-reset">Открытые вакансии</a>
                </p>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold mb-4">
                    Навигация
                </h6>
                <p>
                    <a href="<?= MAIN_PREFIX ?>/index/" class="text-reset">Главная страница</a>
                </p>
                <p>
                    <a href="<?= MAIN_PREFIX ?>/catalog/" class="text-reset">Все книги</a>
                </p>
                <p>
                    <a href="<?= MAIN_PREFIX ?>/cartitems/" class="text-reset">Корзина</a>
                </p>
                <p>
                    <a href="<?= MAIN_PREFIX ?>/fav/" class="text-reset">Избранное</a>
                </p>
                <? if (Libs\User::isLogin()): ?> 
                    <p>
                        <a href="<?= MAIN_PREFIX ?>/lk/" class="text-reset">Личный кабинет</a>
                    </p>
                <? endif; ?> 
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                <h6 class="text-uppercase fw-bold mb-4">Контакты</h6>
                <p><i class="fas fa-home me-3 text-secondary"></i> 2-я Красноармейская ул., 4, Санкт-Петербург, 190005</p>
                <p>
                    <i class="fas fa-envelope me-3 text-secondary"></i>
                    test@test.ru
                </p>
                <p><i class="fas fa-phone me-3 text-secondary"></i> +7 999 888 77 66</p>
            </div>

        </div>

    </div>
</section>

<div class="text-center p-4">
    <a class="text-reset fw-bold">@ Book Store, Inc.</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> 
</body>
</html>