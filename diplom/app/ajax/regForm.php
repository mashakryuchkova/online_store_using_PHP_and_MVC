<div class="modal" id="reg_form" tabindex="-1">
    <form>
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #e7e9d3;">
                <div class="modal-header" style="border-bottom: none;">
                    <h3 class="modal-title">Регистрация</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger d-none">

                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Имя</label>
                        <input type="text" name="name" class="form-control" id="name" required="true">
                    </div>
                    <div class="mb-3">
                        <label for="login" class="form-label">Логин</label>
                        <input type="text" class="form-control" id="login" name="login" required="true">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Телефон</label>
                        <input type="phone" class="form-control" id="phone" name="phone" required="true">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password">Пароль</label>
                        <input type="password" class="form-control" id="password" name="password" required="true">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirm">Подтверждение пароля</label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" required="true">
                    </div>
                    <div class="modal-footer">
                        <button class="main_btn" type="button" data-bs-dismiss="modal">Отмена</button>
                        <button class="main_btn" type="submit">
                            Зарегистрироваться
                        </button>
                        <button class="loader d-none main_btn">
                            <div class="lds-heart"><div></div></div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>