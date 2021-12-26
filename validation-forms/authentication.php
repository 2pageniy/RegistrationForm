<?php
    $login = filter_var($_POST['login'],
        FILTER_SANITIZE_STRING);

    $password = filter_var($_POST['password'],
        FILTER_SANITIZE_STRING);

    $password = sha1($password . "dasddsad21sdfdgdsfg");


    require "../blocks/connect.php";
    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password' AND `status` = 'User'");

    $user = $result->fetch_assoc();
    if (count($user) == 0) {
        echo "User not found";
        exit();
    }
    $login_name = $user['login'];
    setcookie('user', $login_name, time() + 3600, "/");

    $mysql->query("UPDATE `users` SET lastLoginDate = NOW() WHERE login = '$login_name'");
    $mysql->close();

    header('Location: /');
?>