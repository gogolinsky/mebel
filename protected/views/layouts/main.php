<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/clear.css"/>
    <link rel="stylesheet/less" href="/css/pager.css">
    <link rel="stylesheet/less" href="/css/lightbox.css">
    <link rel="stylesheet/less" href="/css/style.less">
    <script src="/js/less.js"></script>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <?php Yii::app()->clientScript->registerCoreScript('jquery',CClientScript::POS_END); ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo-container">
                <a href="/"><img src="/images/logo.png" alt="Корпусная мебель Kryzer"/></a>
            </div>
            <nav class="main-menu-container">
                <?php $this->widget('zii.widgets.CMenu',array(
                    'id' => 'main-menu',
                    'items'=>array(
                        array('label'=>'Главная', 'url'=>array('/site')),
                        array('label'=>'Блог', 'url'=>array('/blog')),
                        array('label'=>'Галерея работ', 'url'=>array('/gallery')),
                        array('label'=>'Отзывы', 'url'=>array('/comment')),
                        array('label'=>'Контакты', 'url'=>array('/contact')),
                    ),
                )); ?>
            </nav>
            <div class="index-img-box">
                <img src="/images/header.png" alt=""/>
            </div>
        </header>
        <div class="body">
            <div class="body-left">
                <nav class="side-menu-container">
                    <?php $this->widget('LineWidget'); ?>
                </nav>
                <div class="vk-link">
                    <a href="http://vk.com/cryzer_mebel" target="_blank">Скидка подписчикам нашей группы</a>
                </div>
                <p>Мы воплотим в жизнь любую вашу идею!</p>
                <div class="contact">
                    <div class="phone">+7 (4812) 32-23-52</div>
                    <div class="email"><a href="mailto:cryzer@mail.ru">cryzer@mail.ru</a></div>
                </div>
            </div>
            <div class="body-right">
                <?php echo $content; ?>
            </div>
        </div>
        <footer>
            <div class="body">
                <div class="body-left">
                    <img src="/images/footer.jpg">
                </div>
                <div class="body-right">
                    <nav class="footer-menu-container">
                        <?php $this->widget('zii.widgets.CMenu',array(
                            'id' => 'footer-menu',
                            'items'=>array(
                                array('label'=>'Главная', 'url'=>array('/site')),
                                array('label'=>'Блог', 'url'=>array('/blog')),
                                array('label'=>'Галерея работ', 'url'=>array('/gallery')),
                                array('label'=>'Отзывы', 'url'=>array('/comment')),
                                array('label'=>'Контакты', 'url'=>array('/contact')),
                            ),
                        )); ?>
                    </nav>
                </div>
            </div>
        </footer>
    </div>
    <div class="about">
        <div class="container">
            <div class="about-td">
                <div class="phone">Тел.: (4812) 55-12-51</div>
                <div class="address">г. Смоленск ул. Пушкина, д. Колотушкина</div>
            </div>
            <div class="about-td">
                <a href="/">CRYZER</a> - производство корпусной мебели в Смоленске.
            </div>
            <div class="about-td about-td-dc">
                Создание сайтов <a href="http://dancecolor.ru" target="_blank">DANCECOLOR.RU</a>
            </div>
        </div>
    </div>
    <?php if(Yii::app()->controller->getId() == 'line'): ?><script src="/js/galleria/galleria.min.js"></script><?php endif; ?>
    <script src="/js/jquery.form.js"></script>
    <script src="/js/lightbox.min.js"></script>
    <script src="/js/script.js"></script>
</body>
</html>