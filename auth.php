<?php
require_once('./pdo.php');
require_once('./taskObjects.php');
//session_start();
//
//echo $_SESSION['authorisation'];
if ((!empty($_POST['out']) && ($_POST['out'] == 'out'))){
    $_SESSION['authorisation'] = '';
    header('location:index.php');
}

if (!empty($_POST['email'])){
    $filterEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
}

if(!empty($_POST['pass'])){
    $regPass = '/[a-zA-Z0-9]/';
    $filterPass = preg_match_all($regPass, $_POST['pass']);
}

if((!empty($_POST['pass'])) && (!empty($_POST['email']))){
    if ($filterEmail === false){
            header('location:autorisation.php');
        } else {
            if ($filterPass !== strlen($_POST['pass'])){
                header('location:autorisation.php');
            } else {
                    $pass = $_POST['pass'];
                    $email = $_POST['email'];
            }
        }
    } else {
    header('location:autorisation.php');
}

if ((!empty($pass))&&(!empty($email))){
    $i = 0;
    $len = count($resultUsers);
    /** @var Users $user */
    foreach ($resultUsers as $user){
        $userEmail = $user->getUserEmail();
        $userPassword = $user->getUserPassword();
        $i++;

        if (($userEmail !== $email) && ($i < $len)){
            continue;
        } elseif (($userEmail !== $email) && ($i === $len)) {
            $_SESSION['authorisation'] = '';
            header('location:autorisation.php');
            break;
        } else {
            if ($userPassword === $pass) {
                $_SESSION['authorisation'] = 'ok';
                header('location:index.php');
                break;
            } else {
                $_SESSION['authorisation'] = '';
                header('location:autorisation.php');
                break;
            }
        }
    }
} else {
    $_SESSION['authorisation'] = '';
    header('location:autorisation.php');
}

