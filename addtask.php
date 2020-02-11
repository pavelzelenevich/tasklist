<?php
//ini_set('display_errors','1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);

require_once('./pdo.php');
require_once('./taskObjects.php');

if ((empty($_POST['taskname'])) || (empty($_POST['update'])) || (empty($_POST['addToDoing'])) || (empty($_POST['addToDone'])) || (empty($_POST['comment']))){
    header('location:index.php');
}

if ((!empty($_POST['taskname'])) && ((!empty($_POST['taskstatus'])) && ($_POST['taskstatus'] == 'ToDo')) && (!empty($_POST['deadlinedate'])) && (!empty($_POST['texttask']))){
    $datetime = date('d/m/Y H:i');
    $taskname = $_POST['taskname'];
    $taskstatus = $_POST['taskstatus'];
    $tasktext = $_POST['texttask'];
    $deadlinetask = $_POST['deadlinedate'];
    $pdo->query("INSERT INTO `task`.`todo` ( `name`, `text`, `deadline`, `datetime` ) VALUES ('$taskname', '$tasktext', '$deadlinetask', '$datetime')");
    header('location:index.php');
}

if((!empty($_POST['taskname'])) && ((!empty($_POST['taskstatus'])) && ($_POST['taskstatus'] == 'Doing')) && (!empty($_POST['deadlinedate'])) && (!empty($_POST['texttask']))){
    $datetime = date('d/m/Y H:i');
    $taskname = $_POST['taskname'];
    $taskstatus = $_POST['taskstatus'];
    $tasktext = $_POST['texttask'];
    $deadlinetask = $_POST['deadlinedate'];
    $pdo->query("INSERT INTO `task`.`doing` ( `name`, `text`, `deadline`, `datetimecreate`, `datetimedo` ) VALUES ('$taskname', '$tasktext', '$deadlinetask', '$datetime', '$datetime')");
    header('location:index.php');
}

if((!empty($_POST['taskname'])) && ((!empty($_POST['taskstatus'])) && ($_POST['taskstatus'] == 'Done')) && (!empty($_POST['deadlinedate'])) && (!empty($_POST['texttask']))){
    $datetime = date('d/m/Y H:i');
    $taskname = $_POST['taskname'];
    $taskstatus = $_POST['taskstatus'];
    $tasktext = $_POST['texttask'];
    $deadlinetask = $_POST['deadlinedate'];
    $pdo->query("INSERT INTO `task`.`done` ( `name`, `text`, `deadline`, `datetimecreate`, `datetimedo`, `datetimeend`, `doingid` ) VALUES ('$taskname', '$tasktext', '$deadlinetask', '$datetime', '$datetime', '$datetime', '')");
    header('location:index.php');
}

if((!empty($_POST['taskname'])) && (!empty($_POST['taskstatus'])) && (!empty($_POST['deadlinedate'])) && (!empty($_POST['texttask'])) && (!empty($_POST['update']))){
    $datetime = date('d/m/Y H:i');
    $taskid = $_POST['update'];
    $taskname = $_POST['taskname'];
    $taskstatus = $_POST['taskstatus'];
    $tasktext = $_POST['texttask'];
    $deadlinetask = $_POST['deadlinedate'];
    $pdo->query("DELETE FROM `todo` WHERE `todo`.`id` = '$taskid'");
    $pdo->query("INSERT INTO `task`.`doing` ( `name`, `text`, `deadline`, `datetimecreate` ) VALUES ('$taskname', '$tasktext', '$deadlinetask', '$datetime' )");
    header('location:index.php');
}

if((!empty($_POST['addToDoing']))) {
    $id = $_POST['addToDoing'];
    echo $id;
    /** @var ToDo $item */
    foreach ($result as $item) {
        $idTodo = $item->getIdBd();
        if ($idTodo === $id) {
            $taskname = $item->getNameBd();
            $tasktext = $item->getTextBd();
            $deadlinetask = $item->getDeadlineBd();
            $datetimeCreate = $item->getDatetimeBd();
            $datetime = date('d/m/Y H:i');
            $pdo->query("INSERT INTO `task`.`doing` ( `name`, `text`, `deadline`, `datetimecreate`, `datetimedo` ) VALUES ('$taskname', '$tasktext', '$deadlinetask', '$datetimeCreate', '$datetime')");
            $pdo->query("DELETE FROM `todo` WHERE `todo`.`id` = '$id'");
            header('location:index.php');
        }
    }
}

if((!empty($_POST['addToDone']))) {
    $idDone = $_POST['addToDone'];
    /** @var Doing $item */
    foreach ($resultDoing as $item) {
        $idDoing = $item->getIdBd();
        if ($idDoing === $idDone) {
            $taskname = $item->getNameBd();
            $tasktext = $item->getTextBd();
            $deadlinetask = $item->getDeadlineBd();
            $datetimeCreate = $item->getDatetimeCreateBd();
            $datetimeDo = $item->getDatetimeDoBd();
            $datetime = date('d/m/Y H:i');
            $pdo->query("INSERT INTO `task`.`done` (  `name`, `text`, `deadline`, `datetimecreate`, 
            `datetimedo`, `datetimeend`, `doingid` ) VALUES ('$taskname', '$tasktext', '$deadlinetask', '$datetimeCreate', 
            '$datetimeDo', '$datetime', '$idDoing')");
            $pdo->query("DELETE FROM `doing` WHERE `doing`.`id` = '$idDone'");
            header('location:index.php');
        }
    }
}

if(!empty($_POST['comment'])){
    $commentid = $_POST['commentid'];
    $comment = $_POST['comment'];
    $pdo->query("INSERT INTO `task`.`comments` ( `doingid`, `comments` ) VALUES ('$commentid', '$comment')");
    header('location:index.php');
}