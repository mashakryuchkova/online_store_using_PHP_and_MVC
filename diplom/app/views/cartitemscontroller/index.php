<?php require_once DIR_PATH_APP . '/views/header.php' ?>
<?

use Libs\App; ?>

<div class="back">
    <a href="<?= MAIN_PREFIX ?>/">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
            <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
        </svg>
        Вернуться к покупкам
    </a>
</div>
<div class="cart-container" style="min-height: 440px;">
    <div class='title'>Ваш заказ</div>
    <?
    $totalCost = 0;
    $hasItems = false;
    $selectedBooks = array();

    $currentUserId = Libs\User::getID();

    $userCarts = array();
    foreach ($this->arResult["CARTS"] as $cart) {
        if ($cart['user_id'] == $currentUserId) {
            $userCarts[] = $cart['id'];
        }
    }

    $cartItems = array();

    foreach ($this->arResult["CART_ITEMS"] as $cart_items):
        if (in_array($cart_items['cart_id'], $userCarts)):
            $hasItems = true;
            $selectedBooks[] = $cart_items['book_id'];

            if (isset($cartItems[$cart_items['book_id']])) {
                $cartItems[$cart_items['book_id']]['quantity'] += $cart_items['quantity'];
            } else {
                $cartItems[$cart_items['book_id']] = $cart_items;
            }
        endif;
    endforeach;

    foreach ($cartItems as $cart_item):
        foreach ($this->arResult["ITEMS"] as $book):
            if ($book['id'] == $cart_item['book_id']):
                ?>
                <div class="cart-item"> 
                    <div class="item-image"> 
                        <?php if (!empty($book['front_img'])): ?> 
                            <img src="<?= MAIN_PREFIX ?>/upload/<?= $book['front_img'] ?>" width="100px"/> 
            <?php endif; ?> 
                    </div> 
                    <div class="item-details"> 
                        <h4 style="display: none;"><?= $book['id'] ?></h4> 
                        <h4><?= $book['name'] ?></h4> 
                        <h4 style="color: #666; font-size: 20px;"><?= $book['author'] ?></h4> 
                        <h5><?= $book['price'] ?>₽</h5> 
                        <div class="items counter-wrapper"> 
                            <div class="">Количество:&nbsp;</div> 
                            <div class="items__control" data-counter><?= $cart_item['quantity'] ?></div> 
                        </div> 
                    </div> 
                    <button class="main_btn" href="javascript:;" onclick="cartDelete(<?= $cart_item["id"] ?>)">Удалить</button> 

                    <?
                    $itemCost = $cart_item['quantity'] * $book['price'];
                    $totalCost += $itemCost;
                endif;
            endforeach;
            ?>
        </div>
    <?
    endforeach;
    if ($hasItems):
        ?>
        <div class="cart-total">
            Общая стоимость: <?= $totalCost ?>₽
        </div>
        <div class="cart-clear">
            <button class="main_btn" href="javascript:;" onclick="allDelete(<?= $currentUserId ?>)">Очистить корзину</button> 
        </div>
        <div class="cart-end"> 
            <?
            if (count($this->arResult["ORDERS"]) > 0):
                foreach ($this->arResult["ORDERS"] as $order):
                    if (($order['user_id'] == Libs\User::getID()) && $order['completed'] == 0):
                        ?> 
                        <button class="main_btn" 
                                onclick="submitOrder(<?= $order['id'] ?>, '<?= $currentUserId ?>')">Оформить заказ 
                        </button>
            <?
            endif;
        endforeach;
    endif;
    ?> 
        </div>
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
<? else: ?>
        <div data-cart-empty class="alert alert-danger" role="alert" style="text-align: center; margin: 5px;"> 
            Корзина пуста
        </div>
<? endif; ?>
</div>

<?php require_once DIR_PATH_APP . '/views/footer.php' ?>
