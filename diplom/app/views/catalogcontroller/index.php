<?php require_once DIR_PATH_APP . '/views/header.php' ?>
<? use Libs\App; ?>

<div class="back">
    <a href="<?= MAIN_PREFIX ?>/">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
            <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
        </svg>
        Вернуться к покупкам
    </a>
</div>
<div class="title" >
    <div class="col-md-12">
        <a href="<?= MAIN_PREFIX ?>/catalog/">Каталог</a>
    </div>
    <div class="input-group">   
        <input id="search" type="text" name="q" class="form-control" placeholder="Поиск...">  
    </div>
</div>
</div>
<div id="container" class="container"> 
    <div class="menu" style="display: flex; flex-flow: column wrap;"> 
        <?php foreach ($this->arResult["GENRES"] as $genre): ?> 
            <a href="<?= MAIN_PREFIX ?>/catalog/?genre_id=<?= $genre['id'] ?>" class="genre-link" data-depth-level="<?php echo $genre['depth_level']; ?>"><?php echo $genre['name']; ?></a> 
        <?php endforeach; ?> 
    </div> 
    <div class="catalog"> 
        <?php 
        $genre_id = isset($_GET["genre_id"]) ? $_GET["genre_id"] : "all"; 
 
        $genre_books = array(); 
        foreach ($this->arResult["ITEMS"] as $book) { 
            if ($genre_id == "all" || $book["genres_id"] == $genre_id) { 
                $genre_books[] = $book; 
            } 
        }

        if ($genre_id != "all") {
            foreach ($this->arResult["GENRES"] as $genre) {
                if ($genre["parent_id"] == $genre_id) {
                    foreach ($this->arResult["ITEMS"] as $book) {
                        if ($book["genres_id"] == $genre["id"]) {
                            $genre_books[] = $book;
                        }
                    }
                }
            }
        }
 
        if (count($genre_books) > 0): 
        ?> 
            <div class="container_card"> 
                <?php foreach ($genre_books as $book): ?> 
                    <div class="card" id="openMoreInfo" method="post"> 
                        <div class="scid" style="display: none;"><?= $book['id'] ?></div> 
                        <div class="card__top"> 
                            <a href="<?= MAIN_PREFIX ?>/info/?id=<?= $book['id'] ?>" class="card__image"> 
                                <?= strlen($book["front_img"]) > 0 ? "<img class='scimg' src='" . MAIN_PREFIX . "/upload/{$book["front_img"]}' width='100px'/>" : "" ?> 
                            </a> 
                        </div> 
                        <div style="height: 80px;"> 
                            <a class="card__name" href="<?= MAIN_PREFIX ?>/info/?id=<?= $book['id'] ?>"> 
                                <?= $book['name'] ?> 
                            </a> 
                            <a class="card__author" href="<?= MAIN_PREFIX ?>/info/?id=<?= $book['id'] ?>"> 
                                <?= $book['author'] ?> 
                            </a> 
                        </div>
                        <form>
                            <div class="card__add">
                                <div class="card__price">
                                    <div class="scprice"><?= $book['price'] ?></div>₽
                                    <input type="hidden" name="user_id" value="<?= Libs\User::getID() ?>">
                                        <input type="hidden" name="price" value="<?= $book['price'] ?>">
                                            <input type="number" min="1" oninput="validity.valid || (value = '1')" name="quantity" style="width: 50px; margin-left: 40%;" value="1">
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
                                                                    </div> 
                                                                </div> 
                                                            </div> 
                                                        </div>
                                                    <? endif; ?> 
                                                </div>
                                                </div>
                                                </form>
                    </div> 
                <?php endforeach; ?> 
            </div> 
        <?php else: ?> 
            <div class="alert alert-danger" role="alert" style="text-align: center; margin: 5px;"> 
                Нет товаров 
            </div> 
        <?php endif; ?> 
    </div> 
</div>

<?php require_once DIR_PATH_APP . '/views/footer.php' ?>