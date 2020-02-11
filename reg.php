<?php
ini_set('display_errors','1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once('./pdo.php');
require_once('./taskObjects.php');
//session_start();
if (!empty($_POST['login'])){
    $regLogin = '/[a-zA-Z0-9_]/';
    $filterLogin = preg_match_all($regLogin, $_POST['login']);
}

if(!empty($_POST['pass'])){
    $regPass = '/[a-zA-Z0-9]/';
    $filterPass = preg_match_all($regPass, $_POST['pass']);
}

if (!empty($_POST['email'])){
    $filterEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
}

if(!empty($_POST['passtwice'])){
    $regPass2 = '/[a-zA-Z0-9]/';
    $filterPass2 = preg_match_all($regPass, $_POST['passtwice']);
}

if( (!empty($_POST['login'])) && (!empty($_POST['pass'])) && (!empty($_POST['passtwice'])) && (!empty($_POST['email'])) ){
    if($filterLogin !== strlen($_POST['login'])){
//        echo 'логин невалидный!';
        header('location:registration.php');
    } else {
        if ($filterEmail === false){
            header('location:registration.php');
        } else {
            if ($filterPass !== strlen($_POST['pass'])){
                header('location:registration.php');
            } else {
                if ( $_POST['pass'] === $_POST['passtwice'] ) {
                    $login = $_POST['login'];
                    $pass = $_POST['pass'];
                    $email = $_POST['email'];
                    if ((!empty($login))&&(!empty($pass))&&(!empty($email))){
                        if(!empty($resultUsers)) {
                            /** @var Users $user */
                            foreach ($resultUsers as $user) {
                                $userEmail = $user->getUserEmail();
                                if ($userEmail === $email) {
                                    header('location:registration.php');
                                } else {
                                    $pdo->query("INSERT INTO `task`.`users` (`login`, `email`, `password`) VALUES ('$login','$email','$pass')");
                                    $_SESSION['authorisation'] = 'ok';
                                    header('location:index.php');
                                }
                            }
                        } else {
                            $pdo->query("INSERT INTO `task`.`users` (`login`, `email`, `password`) VALUES ('$login','$email','$pass')");
                            $_SESSION['authorisation'] = 'ok';
                            header('location:index.php');
                        }
                    }
                } else {
                    header('location:registration.php');
                }
            }
        }
    }
} else {
    header('location:registration.php');
}
