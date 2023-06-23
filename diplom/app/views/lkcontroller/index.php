<? require_once DIR_PATH_APP . '/views/header.php' ?>

<div class="section lk">
    <div class="back">
    <a href="<?= MAIN_PREFIX ?>/">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
            <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
        </svg>
        Вернуться к покупкам
    </a>
</div>
    <div class="title">Личный кабинет</div>
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Персональные данные
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <?
                    foreach ($this->arResult["USERS"] as $users):
                        if ($users["id"] == Libs\User::getID()):
                            ?>
                            <div class="input-group">
                                <span class="input-group-text">Имя</span>
                                <div class="form-control"><?= $users["name"] ?></div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Логин</span>
                                <div class="form-control"><?= $users["login"] ?></div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Телефон</span>
                                <div class="form-control"><?= $users["phone"] ?></div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Почта</span>
                                <div class="form-control"><?= $users["email"] ?></div>
                            </div>
                            <button class="btn btn-outline-secondary" style="margin-top: 30px;" type="button" onclick="getEditById(<?= $users["id"] ?>)">Редактировать данные</button>
                        <?
                        endif;
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    Ваши заказы
                </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <?php
                    $previousOrderId = null;

                    if (empty($this->arResult["ORDERS"])) {
                        echo '<div data-cart-empty class="alert alert-danger" role="alert" style="text-align: center; margin: 5px;">Заказов нет!</div>';
                    } else {
                        foreach ($this->arResult["ORDERS"] as $order):
                            $totalCost = 0;
                            $orderDisplayed = false;

                            foreach ($this->arResult["ORDER_ITEMS"] as $order_item):
                                foreach ($this->arResult["BOOKS"] as $book):
                                    if (($order["user_id"] == Libs\User::getID()) && ($order["completed"] == 1)):
                                        if ($order["id"] == $order_item["order_id"]):
                                            if ($book["id"] == $order_item["book_id"]):
                                                if ($previousOrderId !== null && $previousOrderId !== $order["id"]):
                                                    echo '</div><div class="order-separator"></div><div class="order-details">';
                                                endif;
                                                if (!$orderDisplayed) {
                                                    echo '<h5>Заказ № ' . $order["id"] . ' Оформлен ' . $order["created_at"]  . '</h5>';
                                                    echo '<h6>Стутус заказа: ' . $order["status"] . '</h6>';
                                                    $orderDisplayed = true;
                                                }
                                                $previousOrderId = $order["id"];
                                                $itemCost = $order_item['price'] * $order_item['quantity'];
                                                $totalCost += $itemCost;
                                                ?>   
                                                <div class="cards">    
                                                    <img src="<?= MAIN_PREFIX ?>/upload/<?= $book['front_img'] ?>"/>    
                                                    <div class="cards_details">    
                                                        <h5><?= $book['name'] ?></h5>    
                                                        <h6 style="color: #666;"><?= $book['author'] ?></h6>    
                                                        <h6><?= $order_item['quantity'] ?> шт.</h6><h6><?= $order_item['price'] ?>₽</h6>    
                                                    </div>    
                                                </div>    
                                            <?php
                                            endif;
                                        endif;
                                    endif;
                                endforeach;
                            endforeach;
                            if ($totalCost > 0) {
                                echo '<div class="total-cost">Итоговая стоимость: ' . $totalCost . '₽</div>';
                            }
                        endforeach;
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<? require_once DIR_PATH_APP . '/views/footer.php' ?>