<?php require_once DIR_PATH_APP . '/views/header.php' ?>

<? foreach ($this->arResult["ITEMS"] as $book):
    if ($book["id"] == $_GET['id']): ?>
        <div class="name">
        <?= $book['name'] ?>
        </div>
        <div class="author">
        <?= $book['author'] ?>
        </div>
        <div class="flex-container">
            <div class="flex-item image" style="padding-left: 50px; padding-bottom: 50px;">
                <?= strlen($book["front_img"]) > 0 ? "<img src='" . MAIN_PREFIX . "/upload/{$book["front_img"]}' width='300px'/>" : "" ?>
            </div>
            <div class="flex-item center">
                <div class="year_publishing">
                    <div class="t-title">Год публикации: <?= $book['year_publishing'] ?></div>
                </div>
                <div class="publishing_house">
                    <div class="t-title">Издательство: <?= $book['publishing_house'] ?></div>
                </div>
                <div class="price">
                    <div class="t-title">Количество страниц: <?= $book['price'] ?></div>
                </div>
                <? foreach ($this->arResult["GENRES"] as $genre): ?>
                    <? if ($book['genres_id'] == $genre['id']): ?>
                        <div class="genre">
                            <div class="t-title">Жанр: <?= $genre['name'] ?></div>
                        </div>
                    <? endif; ?>
                <? endforeach; ?>

                <div class="description">
                    <div class="t-title">Описание:</div>
                        <?= $book['description'] ?>
                </div>
            </div>
            <div class="flex-item right_side">
                <? if ($book['stock'] == 1) : ?>
                    <div class="stock">
                        В наличии
                    </div>
                <? else : ?>
                    <div class="stock">
                        Нет в наличии
                    </div>
                <? endif; ?>
                <form>
                    <div class="card__add">
                        <div class="card__price">
                            <div class="scprice"><?= $book['price'] ?></div>₽
                            <input type="hidden" name="user_id" value="<?= Libs\User::getID() ?>">
                            <input type="hidden" name="price" value="<?= $book['price'] ?>">
                            <input type="number" min="1" oninput="validity.valid || (value = '1')" name="quantity" style="width: 50px; margin-left: 40%;" value="1">
                        </div>
                        <div class="card_in">
                            <? if (count($this->arResult["CARTS"]) > 0):
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
                                    <? endif;
                                endforeach;
                                if (!$cartExists): ?> 
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
                                                </div> 
                                            </div> 
                                        </div> 
                                    </div> 
                                    <? endif;
                                else: ?> 
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
                                            </div> 
                                        </div> 
                                    </div> 
                                </div> 
                                    <? endif;
                                    if (Libs\User::isLogin()):?> 
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
                                            </div> 
                                        </div> 
                                    </div> 
                                </div>
                            <? endif; ?> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    <? endif;
endforeach;?>

<?php require_once DIR_PATH_APP . '/views/footer.php' ?>