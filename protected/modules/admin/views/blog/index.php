<div class="well bs-component">
    <fieldset>
        <legend>Список статей</legend>
        <div class="row">
            <div class="col-xs-2">
                <a class="btn btn-success" href="/admin/blog/create">Создать пост</a>
            </div>
        </div>
        <br/>
        <div class="row">
            <table class="table table-hover">
                <thead>
                <td>#</td>
                <td>Название</td>
                <td>Редактировать</td>
                </thead>
                <?php $i=1; foreach($posts as $item): ?>
                    <tr>
                        <td class="col-xs-1"><?php echo $i; ?></td>
                        <td><?php echo $item->title; ?></td>
                        <td class="col-xs-1"><a href="/admin/blog/<?php echo $item->id; ?>" class="btn btn-success btn-xs">Редактировать</a></td>
                    </tr>
                    <?php $i++; endforeach; ?>
            </table>
        </div>
    </fieldset>
</div>