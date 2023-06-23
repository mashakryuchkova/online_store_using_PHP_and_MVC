<? require_once DIR_PATH_APP . '/views/admin/header.php' ?>
        <h3 style="padding-bottom: 15px; margin: 0px; font-weight: bold;">
            Жанры
        </h3>
        <div class="row">
            <div class="input-group" style="width: 60%;"> 
                <input id="search" type="text" name="q" class="form-control" placeholder="Поиск...">
            </div>
            <div class="col-md-4">
                <button type="button" class="main_btn" data-bs-toggle="modal" data-bs-target="#new_genre_modal">
                    Добавить жанр
                </button>
            </div>
        </div>
    </div>
</div>
<div class="main">
<? if (count($this->arResult["GENRES"]) > 0): ?>
    <div id="table_container">
        <table class="table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Имя</th>
                    <th>Код</th>
                    <th>Уровень</th>
                    <th>Кол-во подкатегорий</th>
                    <th>Родитель</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <? foreach ($this->arResult["GENRES"] as $genres): ?>
                    <tr>    
                        <td><?= $genres["id"] ?></td>
                        <td><?= $genres["name"] ?></td>
                        <td><?= $genres["code"] ?></td>
                        <td><?= $genres["depth_level"] ?></td>
                        <td><?= $genres["count_children"] ?></td>
                        <td><?= $genres["parent_id"] ?></td>
                        <td>
                            <button class="btn btn-info" style="border-radius: 20px/20px;" href="javascript:;" onclick="getEditFormById(<?= $genres["id"] ?>)">Изменить</button>
                            &nbsp;
                            <button class="btn btn-danger" style="border-radius: 20px/20px;" href="javascript:;" onclick="genreDelete(<?= $genres["id"] ?>, '<?= $genres["name"] ?>')">Удалить</button>
                        </td>
                    </tr>
                <? endforeach; ?>
            </tbody>
            <tfooter></tfooter>
        </table>
    <? else: ?>
        <div class="alert alert-danger" role="alert" style="text-align: center; margin: 5px;">
            Нет жанров по Вашему запросу
        </div>
    <? endif ?>
</div>
</div>
<div class="modal" id="new_genre_modal" role="dialog" aria-labelledby="new_genre_modal_title" aria-hidden="true" tabindex="-1">
    <form id="form_new_genre" method="post" action="<?= ADMIN_PREFIX ?>/genres/add/">
        <div class="modal-dialog">
            <div class="modal-content" style="padding: 20px; background-color: #e7e9d3;">
                <div class="modal-header">
                    <h5 class="modal-title">Добавление жанра</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="alert alert-danger error_danger" style="display: none;" role="alert">
                    Произошла ошибка!
                </div>
                <input type="hidden" value="0" name="depth_level"/>
                <div class="mb-3">
                    <label for="genre_name">Название категории</label>
                    <input type="text" required class="form-control" name="genre_name" id="genre_name" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="genre_code">Код категории</label>
                    <input type="text" required class="form-control" name="genre_code" id="genre_code" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="parent_genre">Родительская категория</label>
                    <select class="form-control" name="parent_genre" id="parent_genre">
                        <option value="0" data-depth-level='-1'>.</option>
                        <? foreach ($this->arResult["GENRES"] as $genre):
                            echo '<option value="' . $genre["id"] . '" data-depth-level="' . $genre['depth_level'] . '">' . $genre['name'] . '</option>';
                         endforeach; ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="main_btn" type="button" data-bs-dismiss="modal">Отмена</button>
                    <button class="main_btn" type="submit" id="add_new_genre">
                        Добавить
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<? require_once DIR_PATH_APP . '/views/admin/footer.php' ?>