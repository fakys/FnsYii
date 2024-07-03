<?php
\frontend\assets\AppAsset::register($this);

$this->beginPage();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php $this->head()?>
</head>
<body>
<?php $this->beginBody()?>
<header class="container p-1">
    <div class="row">
        <div class="col-lg-1 text-center">
            <a href="#" class="main-logo-header">
                FNS
            </a>
        </div>
        <div class="col-lg-2">
            <div class="d-flex justify-content-center align-items-center">
                <div class="btn-catalog-header">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                    Каталог
                </div>
            </div>

        </div>
        <div class="col-lg-6">
            <form class="d-flex gap-2">
                <input type="search" class="form-control search-input-header">
                <div class="d-flex align-items-center">
                    <input type="submit" class="btn-search-header" value="Найти">
                </div>

            </form>
        </div>
        <div class="col-lg-3 d-flex justify-content-center gap-3">
            <a href="#" class="link-header">
                <i class="fa fa-heart" aria-hidden="true"></i>
                Избранное
            </a>
            <a href="#" class="link-header">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Корзина
            </a>
            <a href="#" class="link-header">
                <i class="fa fa-user" aria-hidden="true"></i>
                Войти
            </a>
        </div>
    </div>
</header>
<?=$content?>
sdsd
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
