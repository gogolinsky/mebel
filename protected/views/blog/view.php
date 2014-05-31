<div class="bread">

</div>
<h1>
    <?php
    $this->widget('zii.widgets.CBreadcrumbs', array(
        'homeLink'=>CHtml::link('Блог','/blog'),
        'separator'=>" &mdash; ",
        'links'=>array(
            "$post->title",
        ),
    ));
    ?>
</h1>
<div class="post">
    <div class="date">
        <?php echo $post->date; ?>
    </div>
    <?php echo $post->blog; ?>
</div>