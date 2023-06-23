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