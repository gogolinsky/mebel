<h1>Блог</h1>
<div class="posts">
    <?php foreach($posts as $item): ?>
        <div class="post">
            <p class="date"><?php $d = date_create($item->date); echo date_format($d, 'd.m.Y'); ?></p>
            <p class="title"><a href="/blog/<?php echo $item->id; ?>"><?php echo $item->title; ?></a></p>
            <?php
                preg_match('/(img|src)=("|\')([^"\'>]+)/i', $item->blog, $img);
            ?>
            <img src="<?php echo $img[3]; ?>">
            <?php
                preg_match('/<p>(?!.*img).*<\/p>/i', $item->blog, $first_p);
            ?>
            <?php echo $first_p[0]; ?>
            <p class="link"><a href="/blog/<?php echo $item->id; ?>">Читать целиком</a></p>
        </div>
    <?php endforeach; ?>
</div>
<div class="paginator">
    <?php $this->widget('CLinkPager', array(
        'pages' => $pages,
        'header' => '',
        'prevPageLabel' => 'Сюда',
        'nextPageLabel' => 'Туда',
        'maxButtonCount' => 3,
        'cssFile' => Yii::app()->theme->baseUrl . '/css/pager.css',
//        'htmlOptions' => array(
//            'class' => 'paginator'
//        ),
    ))?>
</div>