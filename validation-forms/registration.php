<?php
    $login = filter_var(trim($_POST['login']),
        FILTER_SANITIZE_STRING);

    $email = filter_var(trim($_POST['email']),
        FILTER_SANITIZE_STRING);

    $password = filter_var($_POST['password'],
        FILTER_SANITIZE_STRING);

    $repeat_password = filter_var($_POST['repeat-password'],
        FILTER_SANITIZE_STRING);

    require "../blocks/connect.php";

    if(mb_strlen($login) < 3 || mb_strlen($login) > 90 || mysqli_num_rows($mysql->query("SELECT * FROM `users` WHERE `login` = '$login'")) == 1) {
        echo "Invalid login";
        exit();
    } else if(mb_strlen($email) < 3 || mb_strlen($email) > 50) {
        echo "Invalid email length";
        exit();
    } else if(mb_strlen($password) < 1 || mb_strlen($password) > 20) {
        echo "Invalid password length (from 1 to 20)";
        exit();
    } else if($password != $repeat_password) {
        echo "Different password";
        exit();
    }

    $password = sha1($password."dasddsad21sdfdgdsfg");


    $mysql->query("INSERT INTO `users` (`login`, `password`, `email`, `status`) VALUES('$login', '$password', '$email', 'User')");

    $mysql->close();

    header('Location: /');
?>