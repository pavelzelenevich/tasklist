<?php
require_once('./pdo.php');
class ToDo
{

    public function getIdBd()
    {
        return $this->id;
    }

    public function getNameBd()
    {
        return $this->name;
    }

    public function getTextBd()
    {
        return $this->text;
    }

    public function getDeadlineBd()
    {
        return $this->deadline;
    }

    public function getDatetimeBd()
    {
        return $this->datetime;
    }

}

class Doing
{

    public function getIdBd()
    {
        return $this->id;
    }

    public function getNameBd()
    {
        return $this->name;
    }

    public function getTextBd()
    {
        return $this->text;
    }

    public function getDeadlineBd()
    {
        return $this->deadline;
    }

    public function getDatetimeCreateBd()
    {
        return $this->datetimecreate;
    }

    public function getDatetimeDoBd()
    {
        return $this->datetimedo;
    }

}

class Done
{

    public function getIdBd()
    {
        return $this->id;
    }

    public function getNameBd()
    {
        return $this->name;
    }

    public function getTextBd()
    {
        return $this->text;
    }

    public function getDeadlineBd()
    {
        return $this->deadline;
    }

    public function getDatetimeCreateBd()
    {
        return $this->datetimecreate;
    }

    public function getDatetimeDoBd()
    {
        return $this->datetimedo;
    }

    public function getDatetimeEndBd()
    {
        return $this->datetimeend;
    }

    public function getDoingIdBd()
    {
        return $this->doingid;
    }

}

class Comments
{

    public function getDoingId()
    {
        return $this->doingid;
    }

    public function getComments()
    {
        return $this->comments;
    }

}

class Users
{

    public function getUserId()
    {
        return $this->id;
    }

    public function getUserName()
    {
        return $this->name;
    }

    public function getUserEmail()
    {
        return $this->email;
    }

    public function getUserPassword()
    {
        return $this->password;
    }

}

session_start();

$sth = $pdo->prepare("SELECT * FROM todo"); 
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_CLASS, 'ToDo');

$sthDoing = $pdo->prepare("SELECT * FROM doing"); //последнее закоменченное
$sthDoing->execute();
$resultDoing = $sthDoing->fetchAll(PDO::FETCH_CLASS, 'Doing');

$sthDone = $pdo->prepare("SELECT * FROM done"); //последнее закоменченное
$sthDone->execute();
$resultDone = $sthDone->fetchAll(PDO::FETCH_CLASS, 'Done');

$sthComments = $pdo->prepare("SELECT * FROM comments"); //последнее закоменченное
$sthComments->execute();
$resultComments = $sthComments->fetchAll(PDO::FETCH_CLASS, 'Comments');

$sthUsers = $pdo->prepare("SELECT * FROM users"); //последнее закоменченное
$sthUsers->execute();
$resultUsers = $sthUsers->fetchAll(PDO::FETCH_CLASS, 'Users');