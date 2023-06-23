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