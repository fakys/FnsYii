<?php
    $users = $model->getUsers()->all();
?>
<div>
    <div class="card mb-3">
        <div class="card-header text-white  bg-dark">Название</div>
        <div class="card-body">
            <p class="card-text font-size-20"><?=$model->title?></p>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header text-white  bg-dark">Пользователи</div>
        <div class="card-body">
            <?php foreach ($users as $user):?>
                <div class="d-flex">
                    <div class="content-scroll-block">
                        <div><?=$user->name?></div>
                        <a href="#"><?=$user->email?></a>
                        <div><?=$user->created_at?></div>
                    </div>
                    <div class="ml-auto">
                        <div class="btn btn-danger p-1">Удалить</div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>