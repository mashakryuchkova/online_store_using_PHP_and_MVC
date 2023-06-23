<? require_once DIR_PATH_APP . '/views/admin/header.php' ?>
<h3 style="padding-bottom: 15px; margin: 0px; font-weight: bold;">
    Товары
</h3>
<div class="row" style="text-align: center !important;">
    <div class="input-group" style="width: 60%;"> 
        <input id="search" type="text" name="q" class="form-control" placeholder="Поиск...">
    </div>
    <div class="col-md-4">
        <button type="button" class="main_btn" data-bs-toggle="modal" data-bs-target="#new_book_modal">
            Добавить товар
        </button>
    </div>
</div>
</div>
</div>
<div class="main">
    <? if (count($this->arResult["ITEMS"]) > 0): ?>
        <div id="table_container">
            <table class="table" style="font-size: 15px;">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Автор</th>
                        <th>Имя</th>
                        <th>Код</th>
                        <th>Жанр</th>
                        <th>Страницы</th>
                        <th>Год публикации</th>
                        <th>Издательство</th>
                        <th>Цена</th>
                        <th>Хит</th>
                        <th>В наличии</th>
                        <th>Первое изображение</th>
                        <th>Второе изображение</th>
                        <th>Описание</th>
                        <th>Действия</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <? foreach ($this->arResult["ITEMS"] as $book): ?>
                        <tr>
                            <td><?= $book["id"] ?></td>
                            <td><?= $book["author"] ?></td>
                            <td><?= $book["name"] ?></td>
                            <td><?= $book["code"] ?></td>
                            <td><?= $book["genres_id"] ?></td>
                            <td><?= $book["pages"] ?></td>
                            <td><?= $book["year_publishing"] ?></td>
                            <td><?= $book["publishing_house"] ?></td>
                            <td><?= $book["price"] ?></td>
                            <td><?= $book["hit"] ?></td>
                            <td><?= $book["stock"] ?></td>
                            <td><?= strlen($book["front_img"]) > 0 ? "<img src='" . MAIN_PREFIX . "/upload/{$book["front_img"]}' width='50px'/>" : "" ?></td>
                            <td><?= strlen($book["back_img"]) > 0 ? "<img src='" . MAIN_PREFIX . "/upload/{$book["back_img"]}' width='50px'/>" : "" ?></td>
                            <td>
                                <?php
                                $description = $book["description"];
                                if (strlen($description) > 100) {
                                    $description = mb_substr($description, 0, 100) . "...";
                                }
                                echo $description;
                                ?>
                            </td>

                            <td>
                                <button class="btn btn-info" style="border-radius: 20px/20px;" href="javascript:;" onclick="getEditFormById(<?= $book["id"] ?>)">Изменить</button>
                                &nbsp;
                                <button class="btn btn-danger" style="border-radius: 20px/20px;" href="javascript:;" onclick="bookDelete(<?= $book["id"] ?>, '<?= $book["name"] ?>')">Удалить</button>
                            </td>
                        </tr>
                    <? endforeach; ?>
                </tbody>
                <tfooter></tfooter>
            </table>
        <? else: ?>
            <div class="alert alert-danger" role="alert" style="text-align: center; margin: 5px;">
                Нет товаров по Вашему запросу
            </div>
        <? endif ?>
    </div>
</div>
<div class="modal" id="new_book_modal" role="dialog" aria-labelledby="new_book_modal_title" aria-hidden="true" tabindex="-1">
    <form id="form_new_book" method="post" action="<?= ADMIN_PREFIX ?>/books/add/">
        <div class="modal-dialog">
            <div class="modal-content" style="padding: 20px; background-color: #e7e9d3;">
                <div class="modal-header">
                    <h5 class="modal-title">Добавление товара</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger error_danger" style="display: none;" role="alert">
                        Произошла ошибка!
                    </div>
                    <div class="mb-3">
                        <label for="book_author">Автор книги</label>
                        <input type="text" required class="form-control" name="book_author" id="book_author" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="book_name">Название книги</label>
                        <input type="text" required class="form-control" name="book_name" id="book_name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="book_code">Код книги</label>
                        <input type="text" required class="form-control" name="book_code" id="book_code" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="parent_genre">Категория</label>
                        <select class="form-control" name="parent_genre" id="parent_genre">
                            <option value="0" data-depth-level='-1'>.</option>
                            <?
                            foreach ($this->genres as $genre) {
                                echo '<option value="' . $genre['id'] . '">' . $genre['name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="book_pages">Количество страниц</label>
                        <input type="text" class="form-control" name="book_pages" id="book_pages" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="book_year_publishing">Год публикации</label>
                        <input type="text" class="form-control" name="book_year_publishing" id="book_year_publishing" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="book_publishing_house">Издательство</label>
                        <input type="text" class="form-control" name="book_publishing_house" id="book_publishing_house" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="book_price">Цена</label>
                        <input type="text" required class="form-control" name="book_price" id="book_price" placeholder="">
                    </div>
                    <div class="checkbox mb-3">
                        <label for="book_hit"></label>
                        <input type="checkbox" name="book_hit" id="book_hit" value="1"> Хит
                    </div>
                    <div class="checkbox mb-3">
                        <label for="book_stock"></label>
                        <input type="checkbox" name="book_stock" id="book_stock" value="1"> В наличии
                    </div>
                    <div class="mb-3">
                        <label for="book_front_img">Первое изображение</label>
                        <input type="file" class="form-control" name="book_front_img" id="book_front_img">
                    </div>
                    <div class="mb-3">
                        <label for="book_back_img">Второе изображение</label>
                        <input type="file" class="form-control" name="book_back_img" id="book_back_img">
                    </div>
                    <label for="book_description">Описание</label>
                    <textarea name="book_description" id="book_description" class="form-control" rows="3"></textarea>
                </div>
                <div class="modal-footer">
                    <button class="main_btn" type="button" data-bs-dismiss="modal">Отмена</button>
                    <button class="main_btn" type="submit" id="add_new_book">
                        Добавить
                    </button>
                </div>
            </div>
        </div>
    </form> 
</div>

<? require_once DIR_PATH_APP . '/views/admin/footer.php' ?>