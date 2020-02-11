<?php
//ini_set('display_errors','1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);
session_start();
if ((empty($_SESSION['authorisation'])) || (($_SESSION['authorisation']) !== 'ok')){
    header('location:autorisation.php');
}

require_once('./pdo.php');
require_once('./taskObjects.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
<form action="auth.php" method="post">
    <input name="out" id="out" type="hidden" value="out">
    <button type="submit" id="buttonAddTask" name="buttonAddTask" class="btn btn-success">ВЫЙТИ</button>
</form>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h4 class="card-title">ДОСТУПНЫЕ ЗАДАНИЯ</h4>
            <hr>
            <a class="btn btn-primary" href="createtask.php" role="button">СОЗДАТЬ ЗАДАЧУ</a>
            <hr>
            <?php /** @var ToDo $item */ ?>
            <?php foreach ($result as $item) {  ?>
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">DEADLINE: <?= $item->getDeadlineBd()?></div>
                <div class="card-body">
                    <h5 class="card-title"><?= $item->getNameBd()?></h5>
                    <p class="card-text"><?= $item->getTextBd()?></p>
                    <form method="post" action="update.php">
                        <input type="hidden" name="update" value="<?= $item->getIdBd()?>">
                    <button type="submit" class="btn btn-warning">Изменить</button>
                    </form>
                    <form method="post" action="addtask.php">
                        <input type="hidden" id="addToDoing" name="addToDoing" value="<?= $item->getIdBd()?>">
                    <button type="submit" id="buttonAddTask" name="buttonAddTask" class="btn btn-success">ВЫПОЛНИТЬ!</button>
                    </form>
                </div>
            </div>
            <?php }; ?>
        </div>
        <div class="col-md-4">
            <h4 class="card-title">ВЫПОЛНЯЕМЫЕ ЗАДАНИЯ</h4>
            <hr>
            <?php /** @var Doing $item */ ?>
            <?php foreach ($resultDoing as $item) {  ?>
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Создано: <?= $item->getDatetimeCreateBd()?></div>
                <div class="card-header">Задание стало активно: <?= $item->getDatetimeDoBd()?></div>
                <div class="card-header">DEADLINE: <?= $item->getDeadlineBd()?></div>
                <div class="card-body">
                    <h5 class="card-title"><?= $item->getNameBd()?></h5>
                    <p class="card-text"><?= $item->getTextBd()?></p>
                    <?php /** @var Comments $comment */ ?>
                    <?php foreach ($resultComments as $comment) {  ?>
                        <?php if ($comment->getDoingId() === $item->getIdBd()) { ?>
                            <div class="card-header"><?= $comment->getComments()?></div>
                        <?php } ?>
                    <?php } ?>
                    <form method="post" action="addtask.php">
                        <input type="hidden" name="commentid" value="<?= $item->getIdBd()?>">
                        <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Комментарий"></textarea>
                        <button type="submit" class="btn btn-info">Добавить комментарий</button>
                    </form>
                    <form method="post" action="addtask.php">
                        <input type="hidden" name="addToDone" value="<?= $item->getIdBd()?>">
                        <button type="submit" class="btn btn-dark">Завершить</button>
                    </form>
                </div>
            </div>
            <?php }; ?>
        </div>
        <div class="col-md-4">
            <h4 class="card-title">ВЫПОЛНЕННЫЕ ЗАДАНИЯ</h4>
            <hr>
            <?php /** @var Done $item */ ?>
            <?php foreach ($resultDone as $item) {  ?>
            <div class="card border-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Задание стало активно: <?= $item->getDatetimeDoBd()?></div>
                <div class="card-header">DEADLINE: <?= $item->getDeadlineBd()?></div>
                <div class="card-header">Завершено: <?= $item->getDatetimeEndBd()?></div>
                <div class="card-body text-secondary">
                    <h5 class="card-title"><?= $item->getNameBd()?></h5>
                    <p class="card-text"><?= $item->getTextBd()?></p>
                </div>
                <?php /** @var Comments $comment */ ?>
                <?php foreach ($resultComments as $comment) {  ?>
                    <?php if ($comment->getDoingId() === $item->getDoingIdBd()) { ?>
                        <div class="card-header"><?= $comment->getComments()?></div>
                    <?php } ?>
                <?php } ?>
            </div>
            <?php }; ?>
        </div>
    </div>
</div>
</body>
</html>
