<?php require_once DIR_PATH_APP . '/views/header.php' ?>

<? use Libs\App; ?>
    <div class="title">
        BOOK STORE
    </div>
</div>
</div>
<div class="section books">
    <div class="main_title">
        Бестселлеры
    </div>
    <div id="container">
        <? if (count($this->arResult["ITEMS"]) > 0): ?>
            <div class="container_card">
                <? foreach ($this->arResult["ITEMS"] as $book):
                    if ($book['hit'] == 1) : ?>
                        <div class="card" id="openMoreInfo" metod="post">
                            <div style="display: none;"><?= $book['id'] ?>
                            </div>
                            <div class="card__top">
                                <a href="<?= MAIN_PREFIX ?>/info/?id=<?= $book['id'] ?>"
                                    class="card__image">
                                        <?= strlen($book["front_img"]) > 0 ? "<img class='scimg'src='"
                                                . MAIN_PREFIX . "/upload/{$book["front_img"]}'"
                                                . "width='100px'/>" : "" ?>
                                </a>
                            </div>
                            <div style="height: 80px;">
                                <a
                                    class="card__name"
                                    href="<?= MAIN_PREFIX ?>/info/?id=<?= $book['id'] ?>">
                                    <?= $book['name'] ?>
                                </a>
                                <a
                                    class="card__author"
                                    href="<?= MAIN_PREFIX ?>/info/?id=<?= $book['id'] ?>">
                                    <?= $book['author'] ?>
                                </a>
                            </div>
                          <form>
                            <div class="card__add">
                                <div class="card__price">
                                    <div class="scprice"><?= $book['price'] ?>₽</div>
                                    <input type="hidden" name="user_id" value="<?= Libs\User::getID() ?>">
                                        <input type="hidden" name="price" value="<?= $book['price'] ?>">
                                            <input type="number" min="1" oninput="validity.valid || (value = '1')" id="quantity" name="quantity" value="1">
                                                </div>
                                                <div class="card_in">
                                                    <?
                                                    if (count($this->arResult["CARTS"]) > 0):
                                                        $cartExists = false;
                                                        foreach ($this->arResult["CARTS"] as $cart):
                                                            if ($cart['user_id'] == Libs\User::getID()):
                                                                $cartExists = true;
                                                                ?> 
                                                                <div class="card_in_cart"> 
                                                                    <a class="nav-link active add-to-cart" 
                                                                       aria-current="page" 
                                                                       href="javascript:;" 
                                                                       data-cart_id="<?= $cart['id'] ?>" 
                                                                       data-book_id="<?= $book['id'] ?>" 
                                                                       data-price="<?= $book['price'] ?>">В корзину 
                                                                    </a> 
                                                                </div>
                                                                <?
                                                            endif;
                                                        endforeach;
                                                        if (!$cartExists):
                                                            ?> 
                                                            <button class="btnn" onclick="openModal()">В корзину</button>    
                                                            <div id="myModal" class="modal" tabindex="-1"> 
                                                                <div class="modal-dialog modal-dialog-centered"> 
                                                                    <div class="modal-content"> 
                                                                        <div class="modal-header"> 
                                                                            <h5 class="modal-title">Пожалуйста, зарегистрируйтесь!</h5> 
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button> 
                                                                        </div>  
                                                                        <div class="modal-footer"> 
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                                            <button type="button" onclick="openDialogReg()" class="btn btn-secondary" data-bs-dismiss="modal">Регистрация</button> 
                                                                        </div> 
                                                                    </div> 
                                                                </div> 
                                                            </div> 
                                                            <?
                                                        endif;
                                                    else:
                                                        ?> 
                                                        <button class="btnn" onclick="openModal()">В корзину</button>    
                                                        <div id="myModal" class="modal" tabindex="-1"> 
                                                            <div class="modal-dialog modal-dialog-centered"> 
                                                                <div class="modal-content"> 
                                                                    <div class="modal-header"> 
                                                                        <h5 class="modal-title">Пожалуйста, зарегистрируйтесь!</h5> 
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button> 
                                                                    </div>  
                                                                    <div class="modal-footer"> 
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                                        <button type="button" onclick="openDialogReg()" class="btn btn-secondary" data-bs-dismiss="modal">Регистрация</button>
                                                                    </div> 
                                                                </div> 
                                                            </div> 
                                                        </div> 
                                                    <?
                                                    endif;
                                                    if (Libs\User::isLogin()):
                                                        ?> 
                                                        <div class="card_in_fav">
                                                            <a class="nav-link active add-to-fav <?= $book['is_favorite'] ? 'favorite' : '' ?>"
                                                               aria-current="page"
                                                               href="javascript:;"
                                                               data-user_id="<?= Libs\User::getID() ?>"
                                                               data-book_id="<?= $book['id'] ?>">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    <? else: ?>
                                                        <button class="btnn" onclick="openModal()">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                            </svg>
                                                        </button>    
                                                        <div id="myModal" class="modal" tabindex="-1"> 
                                                            <div class="modal-dialog modal-dialog-centered"> 
                                                                <div class="modal-content"> 
                                                                    <div class="modal-header"> 
                                                                        <h5 class="modal-title">Пожалуйста, зарегистрируйтесь!</h5> 
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button> 
                                                                    </div>  
                                                                    <div class="modal-footer"> 
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button> 
                                                                        <button type="button" onclick="openDialogReg()" class="btn btn-secondary" data-bs-dismiss="modal">Регистрация</button> 
                                                                    </div> 
                                                                </div> 
                                                            </div> 
                                                        </div>
                                                    <? endif; ?> 
                                                </div>
                                                </div>
                                                </form>
                        </div>
                <? endif;
            endforeach; ?>
            </div>
        <? else: ?>
            <div class="alert alert-danger" role="alert" style="text-align: center; margin: 5px;">
                Нет товаров
            </div>
        <? endif ?>
    </div>
</div>
<div class="section map" style="padding: 20px 0px;">
    <div class="main_title">
        Где нас найти?
    </div>
    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A0492423936567270108cfc4d48f5995ffbc3fc4f5d9b22ffdf367e40fe16d2bf&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
</div>
</div>

<?php require_once DIR_PATH_APP . '/views/footer.php' ?>