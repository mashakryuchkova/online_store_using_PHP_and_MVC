<? require_once DIR_PATH_APP . '/views/admin/header.php' ?>

    <h3 style="padding-bottom: 15px; margin: 0px; font-weight: bold;">
        Личный кабинет
    </h3>
</div>

<div class="row">
    <div class="column users">
        <div class="card">
            <div class="t">Всего пользователей</div>
            <div class="cont">
                <div class="left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                </div>
                <div class="right">
                    <? echo($this->arResult["USERS_COUNT"]); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="column orders">
        <div class="card">
            <div class="t">Всего заказов</div>
            <div class="cont">
                <div class="left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                    </svg>
                </div>
                <div class="right">
                    <? echo($this->arResult["ORDERS_COUNT"]); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<? require_once DIR_PATH_APP . '/views/admin/footer.php' ?>