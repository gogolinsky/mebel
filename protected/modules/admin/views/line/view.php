<div class="row">
    <div class="col-xs-2">
        <a class="btn btn-success" href="/admin/line">< Вернуться к списку</a>
    </div>
</div>
<br/>
<form action="/admin/line/update" method="post" enctype="multipart/form-data">
    <input name="id" type="hidden" value="<?php echo $line->id; ?>">
    <div class="row">
        <div class="well">
            <div class="col-xs-7">
                <fieldset>
                    <legend><?php echo $line->name; ?></legend>
                    <div class="form-group">
                        <label for="name" class="control-label">Название</label>
                        <input class="form-control" type="text" name="name" id="name" value="<?php echo $line->name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="url" class="control-label">URL</label>
                        <input class="form-control" type="text" name="url" id="url" value="<?php echo $line->url; ?>">
                    </div>
                    <div class="form-group">
                        <label for="blog" class="control-label">Текст</label>
                        <?php $this->widget('application.extensions.ckeditor.ECKEditor', array(
                            'model'=>$line,
                            'attribute'=>'blog',
                            'htmlOptions' => array(
                                'name' => "blog",
                            ),
                            'language'=>'ru',
                            'height'=>'300px',
                        )); ?>
                    </div>
                </fieldset>
            </div>
            <div class="col-xs-5">
                <div class="img-box">
                    <div>
                        <input type="file" name="images[]" multiple>
                    </div>
                    <br/>
                    <?php foreach($line['lineImages'] as $img): ?>
                        <div class="preview">
                            <img src="/images/work/<?php echo $line->url; ?>/<?php echo $img->name; ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2 col-xs-offset-8">
                    <input type="submit" name="submit" class="btn btn-success" value="Сохранить">
                </div>
                <div class="col-xs-2">
                    <input type="submit" name="remove" class="btn btn-danger btn-xs" value="Удалить">
                </div>
            </div>
        </div>
    </div>
</form>