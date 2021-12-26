<?php
require 'connect.php';
$login = $_COOKIE['user'];
$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `status` = 'User'");
if(mysqli_num_rows($result) == 0) {
    header('Location: ../exit.php');
}