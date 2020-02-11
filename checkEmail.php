<?php
require_once('./pdo.php');
require_once('./taskObjects.php');

if (!empty($_POST['email'])){
    $emailNew = $_POST['email'];
    /** @var Users $user */
    foreach ($resultUsers as $user){
        $userEmail = $user->getUserEmail();
        if($userEmail == $emailNew){
            echo "failEmail";
            break;
        }
    }
}
