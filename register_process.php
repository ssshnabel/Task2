<?php
$host = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName = "task3";

$connect = mysqli_connect($host, $dbUsername, null, $dbName, 3306);
if (!$connect){
    die("Connection error").mysqli_connect_error();
}

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$mail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_EMAIL);
$password = hash('sha3-256', filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING));
$registerDate = date('d-m-Y');
$loginDate = date('d-m-Y');

$requestedStatus = mysqli_query($connect, "SELECT status FROM users WHERE user_mail = '$mail'");
$userStatus = implode(mysqli_fetch_assoc($requestedStatus));
mysqli_close($connect);

if($userStatus != 'blocked'){
    $insertQuery = "INSERT INTO users (`user_name`, `user_mail`, `user_password`, `register_date`, `login_date`, `status`) VALUES ('$name', '$mail', '$password', '$registerDate', '$loginDate', 'active')";
    if(mysqli_query($connect, $insertQuery)){
        header('Location: /');
    } else{
        echo 'Sql-query error'.mysqli_error($connect);
    }
    mysqli_close($connect);
}

