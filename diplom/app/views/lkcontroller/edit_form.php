<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="new_modal_title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="background-color: #e7e9d3;">
            <div class="modal-header" style="border-bottom: none;">
                <h3 class="modal-title" id="new_modal_title">Редактирование категории</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_edit" method="post" action="<?= MAIN_PREFIX ?>/lk/edit/">
                <div class="modal-body">
                    <div class="alert alert-danger error_danger" style="display: none;" role="alert">
                        Произошла ошибка!
                    </div>
                    <div class="mx_auto" style="line-height: 2.5; font-size: 17px;">
                        <input type="hidden" name="id" value="<?= $this->user["id"] ?>"/>
                        <div class="form-group">
                            <label for="user_name">Имя</label>
                            <input type="text" required class="form-control" name="user_name" id="user_name" placeholder="" value="<?= $this->user["name"] ?>">
                        </div>
                    </div>
                    <div class="mx_auto">
                        <div class="form-group">
                            <label for="user_login">Логин</label>
                            <input type="text" required class="form-control" name="user_login" id="user_login" placeholder="" value="<?= $this->user["login"] ?>">
                        </div>
                    </div>
                    <div class="mx_auto">
                        <div class="form-group">
                            <label for="user_phone">Телефон</label>
                            <input type="text" required class="form-control" name="user_phone" id="user_phone" placeholder="" value="<?= $this->user["phone"] ?>">
                        </div>
                    </div>
                    <div class="mx_auto">
                        <div class="form-group">
                            <label for="user_email">Почта</label>
                            <input type="text" required class="form-control" name="user_email" id="user_email" placeholder="" value="<?= $this->user["email"] ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="main_btn" type="button" data-bs-dismiss="modal">Отмена</button>
                    <button class="main_btn" type="submit" onclick="edit()">Изменить</button>
                </div>
            </form>   
        </div>
    </div>  
</div>