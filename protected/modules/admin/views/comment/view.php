<div class="row">
    <div class="col-xs-2">
        <a class="btn btn-success" href="/admin/comment">< Вернуться к списку</a>
    </div>
</div>
<br/>
<form action="/admin/comment/update" method="post" enctype="multipart/form-data">
    <input name="id" type="hidden" value="<?php echo $comment->id; ?>">
    <div class="row">
        <div class="col-xs-12">
            <div class="well">
                <fieldset>
                    <legend><?php echo $comment->title; ?></legend>
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">Автор</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" name="name" id="name" value="<?php echo $comment->name; ?>">
                        </div>
                        <br clear="all">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Заголовок</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" name="title" id="title" value="<?php echo $comment->title; ?>">
                        </div>
                        <br clear="all">
                    </div>
                    <div class="form-group">
                        <label for="blog" class="col-lg-2 control-label">Текст</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" name="text" id="text"><?php echo $comment->text; ?></textarea>
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