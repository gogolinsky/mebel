<div class="row">
    <div class="col-xs-2">
        <a class="btn btn-success" href="/admin/blog">< Вернуться к списку</a>
    </div>
</div>
<br/>
<form action="/admin/blog/update" method="post" enctype="multipart/form-data">
    <input name="id" type="hidden" value="<?php echo $post->id; ?>">
    <div class="row">
        <div class="col-xs-12">
            <div class="well">
                <fieldset>
                    <legend><?php echo $post->title; ?></legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Заголовок</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" name="title" id="title" value="<?php echo $post->title; ?>">
                        </div>
                        <br clear="all">
                    </div>
                    <div class="form-group">
                        <label for="blog" class="col-lg-2 control-label">Текст</label>
                        <div class="col-lg-10">
                            <?php $this->widget('application.extensions.ckeditor.ECKEditor', array(
                                'model'=>$post,
                                'attribute'=>'blog',
                                'htmlOptions' => array(
                                    'name' => "blog",
                                ),
                                'language'=>'ru',
                                'height'=>'1000px',
                            )); ?>
                        </div>
                        <br clear="all">
                    </div>
                </fieldset>
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
    </div>
</form>