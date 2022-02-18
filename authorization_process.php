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

$enteredMail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_EMAIL);
$enteredPassword = hash('sha3-256', filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING));
$loginDate = date('d-m-Y');

$requestedPassword = mysqli_query($connect, "SELECT user_password FROM users WHERE user_mail = '$enteredMail'");
$realPassword = implode(mysqli_fetch_assoc($requestedPassword));
mysqli_close($connect);

$requestedStatus = mysqli_fetch_assoc(mysqli_query($connect, "SELECT status FROM users WHERE user_mail = '$enteredMail'"));
mysqli_close($connect);
if (isset($requestedStatus)){
    $userStatus = implode($requestedStatus);
} else{
    $userStatus = 'active';
}

$requestedId = mysqli_query($connect, "SELECT user_id FROM users WHERE user_mail = '$enteredMail'");
$userId = implode(mysqli_fetch_assoc($requestedId));
mysqli_close($connect);
settype($userId, "integer");


if(($enteredPassword == $realPassword) && ($userStatus != 'blocked')){
    mysqli_query($connect, "UPDATE users SET login_date ='$loginDate' WHERE user_mail = '$enteredMail'");
    mysqli_close($connect);
    $_SESSION['userId'] = $userId;
    header('Location: '.'users_data.php');
}else {
    echo 'Incorrect password or such user does not exist';
}


