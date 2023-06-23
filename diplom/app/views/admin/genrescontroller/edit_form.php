<div class="modal fade" id="edit_genre_modal" tabindex="-1" role="dialog" aria-labelledby="new_genre_modal_title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="background-color: #e7e9d3;">
            <div class="modal-header" style="border-bottom: none;">
                <h3 class="modal-title" id="new_genre_modal_title">Редактирование категории</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_edit_genre" method="post" action="<?= ADMIN_PREFIX ?>/genres/edit/">
                <div class="modal-body">
                    <div class="alert alert-danger error_danger" style="display: none;" role="alert">
                        Произошла ошибка!
                    </div>
                    <div class="mx_auto" style="line-height: 2.5; font-size: 17px;">
                        <input type="hidden" name="id" value="<?= $this->genre["id"] ?>"/>
                        <input type="hidden" value="<?= $this->genre["depth_level"] ?>" name="depth_level"/>
                        <div style="padding-bottom: 10px; color: #888a7c;">
                            Изменяем ID = <span class="edit_id"><?= $this->genre["id"] ?></span>
                        </div>
                        <div class="form-group">
                            <label for="genre_name">Название категории</label>
                            <input type="text" required class="form-control" name="genre_name" id="genre_name" placeholder="" value="<?= $this->genre["name"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="genre_code">Код категории</label>
                            <input type="text" class="form-control" required name="genre_code" id="genre_code" placeholder="" value="<?= $this->genre["code"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="parent_genre">Родительская категория</label>
                            <select class="form-control" name="parent_genre" id="parent_genre">  
                                <option value="0" data-depth-level="-1">.</option>  
                                <? foreach ($this->all_genres as $genre) : ?> 
                                    <option value="<?php echo $genre['id']; ?>" <?php echo ($genre['id'] == $this->genre['parent_id'] ? "selected" : ""); ?> data-depth-level="<?php echo isset($genre['depth_level']) ? $genre['depth_level'] : ''; ?>"><?php echo $genre['name']; ?></option> 
                                <? endforeach; ?> 
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="main_btn" type="button" data-bs-dismiss="modal">Отмена</button>
                    <button class="main_btn" type="submit" onclick="genreEdit()">Изменить</button>
                </div>
            </form>   
        </div>
    </div>  
</div>