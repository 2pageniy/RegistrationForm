<?php

require "../blocks/connect.php";
if($mysql->connect_error){
    die("Error: " . $mysql->connect_error);
}

$action = $_POST['interaction'];
switch ($action)
{
    case 'Block':
        for($i = 0; $i < count($_POST); $i++) {
            $num = array_keys($_POST)[$i];
            $sql = "UPDATE `users` SET `status` = 'Block' WHERE id = '$num'";
            $mysql->query($sql);
        }
        break;
    case 'Unblock' :
        for($i = 0; $i < count($_POST); $i++) {
            $num = array_keys($_POST)[$i];
            $sql = "UPDATE `users` SET `status` = 'User' WHERE id = '$num'";
            $mysql->query($sql);
        }
        break;
    case 'Delete' :
        for($i = 0; $i < count($_POST); $i++) {
            $num = array_keys($_POST)[$i];
            $sql = "DELETE FROM `users` WHERE id = $num";
            $mysql->query($sql);
        }
        break;
}

require '../blocks/logout.php';

header('Location: /');
$mysql->close();
