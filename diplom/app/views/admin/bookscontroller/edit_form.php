<div class="modal fade" id="edit_book_modal" role="dialog" aria-labelledby="new_book_modal_title" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="padding: 20px; background-color: #e7e9d3;">
            <div class="modal-header" style="border-bottom: none;">
                <h3 class="modal-title">Редактирование товара</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form enctype="multipart/form-data" id="form_edit_book" method="post" action="<?= ADMIN_PREFIX ?>/books/edit/">
                <div class="modal-body">
                    <div class="alert alert-danger error_danger" style="display: none;" role="alert">
                        Произошла ошибка!
                    </div>
                    <div class="mx_auto" style="line-height: 2.5; font-size: 17px;">
                        <input type="hidden" name="id" value="<?= $this->book["id"] ?>"/>
                        <div style="padding-bottom: 10px; color: #888a7c;">
                            Изменяем ID = <span class="edit_id"><?= $this->book["id"] ?></span>
                        </div>
                        <div class="form-group">
                            <label for="book_author">Автор книги</label>
                            <input type="text" required class="form-control" name="book_author" id="book_author" placeholder="" value="<?= $this->book["author"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="book_name">Название книги</label>
                            <input type="text" required class="form-control" name="book_name" id="book_name" placeholder="" value="<?= $this->book["name"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="book_code">Код книги</label>
                            <input type="text" required class="form-control" name="book_code" id="book_code" placeholder="" value="<?= $this->book["code"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="parent_genre">Категория</label>
                            <select class="form-control" name="parent_genre" id="parent_genre">
                                <option value="0" data-depth-level='-1'>.</option>
                                <?
                                foreach ($this->genres as $genre) {
                                    $selected = ($genre['id'] == $this->book['genres_id']) ? 'selected' : '';
                                    echo '<option value="' . $genre['id'] . '" ' . $selected . '>' . $genre['name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="book_pages">Количество страниц</label>
                            <input type="text" class="form-control" name="book_pages" id="book_pages" placeholder="" value="<?= $this->book["pages"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="book_year_publishing">Год публикации</label>
                            <input type="text" class="form-control" name="book_year_publishing" id="book_year_publishing" placeholder="" value="<?= $this->book["year_publishing"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="book_publishing_house">Издательство</label>
                            <input type="text" class="form-control" name="book_publishing_house" id="book_publishing_house" placeholder="" value="<?= $this->book["publishing_house"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="book_price">Цена</label>
                            <input type="text" required class="form-control" name="book_price" id="book_price" placeholder="" value="<?= $this->book["price"] ?>">
                        </div>
                        <div class="checkbox"> 
                            <label> 
                                <input name="book_hit" type="checkbox" value="1" <?php echo ($this->book['hit'] == 1) ? 'checked' : ''; ?>> В наличии 
                            </label> 
                        </div>
                        <div class="checkbox"> 
                            <label> 
                                <input name="book_stock" type="checkbox" value="1" <?php echo ($this->book['stock'] == 1) ? 'checked' : ''; ?>> В наличии 
                            </label> 
                        </div>  
                        <div class="form-group">
                            <label for="front_img">Первое изображение</label>
                            <input type="file" class="form-control" id="front_img" name="front_img">
                            <? if (!empty($this->book['front_img'])): ?>
                                <img src="<?= MAIN_PREFIX ?>/upload/<?= $this->book['front_img'] ?>" width='50px'/> 
                            <? endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="back_img">Второе изображение</label>
                            <input type="file" class="form-control" id="back_img" name="back_img">
                            <? if (!empty($this->book['back_img'])): ?>
                                <img src="<?= MAIN_PREFIX ?>/upload/<?= $this->book['back_img'] ?>" width='50px'/> 
                            <? endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="book_description">Издательство</label>
                            <textarea name="book_description" id="book_description" class="form-control" rows="3"><?= $this->book["description"] ?></textarea>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button class="main_btn" type="button" data-bs-dismiss="modal">Отмена</button>
                <button class="main_btn" type="submit" onclick="bookEdit()">Изменить</button>
            </div>
        </div>
    </div>
</div>