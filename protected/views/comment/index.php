<h1>Отзывы</h1>
<div class="comments">
    <?php foreach($comments as $item): ?>
        <div class="comment">
            <p class="title"><?php echo $item->title; ?></p>
            <p class="text"><?php echo $item->text; ?></p>
            <p class="name"><?php echo $item->name; ?></p>
        </div>
    <?php endforeach; ?>
</div>