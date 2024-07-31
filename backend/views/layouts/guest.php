<?php
use backend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage()?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $this->head()?>
    <title>Document</title>
</head>
<body>
<?php $this->beginBody()?>
    <header class="header-guest">
        Админ панель FNS
    </header>
<div><?=$content?></div>

<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>