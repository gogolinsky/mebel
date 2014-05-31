<ul id="side-menu">
    <?php $i=0; foreach ($this->getData() as $item): ?>
        <li><a href="/line/<?php echo $item->url; ?>"><?php echo $item->name; ?></a></li>
    <?php $i++; endforeach; ?>
</ul>