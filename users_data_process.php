<?php
session_start();

$host = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName = "task3";

$connect = mysqli_connect($host, $dbUsername, null, $dbName, 3306);
if (!$connect){
    die("Connection error").mysqli_connect_error();
}

$selectUser = $_POST['select_user'];
$blockButton = $_POST['block'];
$unblockButton = $_POST['unblock'];
$deleteButton = $_POST['delete'];

if (isset($selectUser)){
    foreach ($selectUser as $id){
        if (isset($blockButton)){
            mysqli_query($connect, "UPDATE users SET status = 'blocked' WHERE user_id = '$id'");
            mysqli_close($connect);

            foreach (mysqli_query($connect,"SELECT id FROM users WHERE status = 'blocked'") as $id){
                if ($_SESSION['userId'] = $id){
                    unset($_SESSION['userId']);
                    session_destroy();
                    header( 'location: /');
                }
            }
        }

        if (isset($unblockButton)){
            mysqli_query($connect, "UPDATE users SET status = 'active' WHERE user_id = '$id'");
            mysqli_close($connect);
        }

        if (isset($deleteButton)){
            mysqli_query($connect, "UPDATE users SET status = 'deleted' WHERE user_id = '$id'");
            mysqli_close($connect);

            foreach (mysqli_query($connect,"SELECT id FROM users WHERE status = 'deleted'") as $id){
                if ($_SESSION['userId'] = $id){
                    unset($_SESSION['userId']);
                    session_destroy();
                    header( 'location: /');
                }
            }
            header( 'location: /');
        }
    }
}






