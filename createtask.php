<?php
require_once('./pdo.php');
require_once('./taskObjects.php');

if ((empty($_SESSION['authorisation'])) || (($_SESSION['authorisation']) !== 'ok')){
    header('location:autorisation.php');
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
    <form method="post" action="addtask.php">
        <div class="form-group">
            <label for="exampleFormControlInput1">Название задачи</label>
            <input type="text" class="form-control" id="taskname" name="taskname" placeholder="Введите название задачи">
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
            <input type="date" class="form-control" id="deadlinedate" name="deadlinedate" placeholder="Введите дату дедлайна">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Текст задачи</label>
            <textarea class="form-control" id="texttask" name="texttask" rows="3" placeholder="Введите текст задачи"></textarea>
        </div>
        <button class="btn btn-primary" type="submit" value="Создать">Создать</button>
    </form>
</div>
</body>
</html>
