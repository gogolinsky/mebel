<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/clear.css"/>
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet/less" href="/css/style_a.less">
    <script src="/js/less.js"></script>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <?php Yii::app()->clientScript->registerCoreScript('jquery',CClientScript::POS_END); ?>
    <title>Настройки</title>
</head>
<body>
<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <a href="/site" class="navbar-brand">Kryzer</a>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/admin/blog">Блог</a>
                </li>
                <li>
                    <a href="/admin/line">Направления</a>
                </li>
                <li>
                    <a href="/admin/comment">Комментарии</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Выход</a></li>
            </ul>
        </nav>
    </div>
</header>
    <div class="container">
        <?php echo $content; ?>
    </div>

</body>
</html>