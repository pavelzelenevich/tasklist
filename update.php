<?php
require_once('./pdo.php');
require_once('./taskObjects.php');

if((empty($_POST['update']))) {
   header('location:index.php');
}
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
<div class="container">
<?php
if((!empty($_POST['update']))) {
foreach ($result as $item) {
    $idTodo = $item->getIdBd();
    $id = $_POST['update'];
    if ($idTodo === $id) { ?>
    <form method="post" action="addtask.php">
        <div class="form-group">
            <label for="exampleFormControlInput1">Название задачи</label>
            <input type="text" class="form-control" id="taskname" name="taskname" value="<?= $item->getNameBd()?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Укажите статус</label>
            <select class="form-control" id="taskstatus" name="taskstatus">
                <option>ToDo</option>
                <option>Doing</option>
                <option>Done</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">DEADLINE</label>
            <input type="date" class="form-control" id="deadlinedate" name="deadlinedate" value="<?= $item->getDeadlineBd()?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Текст задачи</label>
            <textarea class="form-control" id="texttask" name="texttask" rows="3"><?= $item->getTextBd()?></textarea>
        </div>
        <input type="hidden" name="update" value="<?= $item->getIdBd()?>">
        <button class="btn btn-primary" type="submit" value="Создать">Изменить</button>
    </form>
<?php } ?>
<?php } ?>
<?php } ?>
</div>
</body>
</html>