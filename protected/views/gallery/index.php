<h1>Галерея</h1>
<div class="gallery">
    <?php foreach($photos as $photo): ?>
        <div class="photo">
            <a href="/images/work/<?php echo $photo->name; ?>" data-lightbox="gallery">
                <img src="/images/work/<?php echo $photo->name; ?>">
            </a>
        </div>
    <?php endforeach; ?>
</div>