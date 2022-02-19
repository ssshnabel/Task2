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

if ($mail != NULL){
    $requestedStatus = mysqli_fetch_assoc(mysqli_query($connect, "SELECT `status` FROM users WHERE user_mail = '$mail'"));
//mysqli_close($connect);
    if ($requestedStatus != NULL){
        $userStatus = implode($requestedStatus);
        if($userStatus != 'blocked'){
            $insertQuery = "INSERT INTO users (`user_name`, `user_mail`, `user_password`, `register_date`, `login_date`, `status`) VALUES ('$name', '$mail', '$password', '$registerDate', '$loginDate', 'active')";
            mysqli_query($connect, $insertQuery);
//        mysqli_close($connect);
            header('Location: /');
        }
    } else{
        $insertQuery = "INSERT INTO users (`user_name`, `user_mail`, `user_password`, `register_date`, `login_date`, `status`) VALUES ('$name', '$mail', '$password', '$registerDate', '$loginDate', 'active')";
        mysqli_query($connect, $insertQuery);
//        mysqli_close($connect);
        header('Location: /');
    }
} else{
    echo 'Entered mail is empty';
}




