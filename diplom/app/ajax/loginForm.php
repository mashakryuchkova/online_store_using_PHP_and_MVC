<div class="modal" id="login_form" tabindex="-1">
    <form>
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #e7e9d3;">
                <div class="modal-header" style="border-bottom: none;">
                    <h3 class="modal-title">Вход</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger d-none">

                    </div>
                    <div class="mb-3">
                        <label for="login" class="form-label">Логин</label>
                        <input type="text" name="login" class="form-control" id="login" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Пароль</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="showPassword">
                            <label class="form-check-label" for="showPassword">Показать пароль</label>
                        </div>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="main_btn" type="button" data-bs-dismiss="modal">Отмена</button>
                    <button class="main_btn" type="submit">
                        Войти
                    </button>
                    <button class="loader d-none main_btn">
                        <div class="lds-heart"><div></div></div>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    var passwordInput = document.getElementById("password");
    var showPasswordCheckbox = document.getElementById("showPassword");

    showPasswordCheckbox.addEventListener("change", function() {
        if (showPasswordCheckbox.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    });
</script>