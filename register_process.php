<?php
require_once "db.inc.php";


$name = $_POST['name'];
$mail = $_POST['mail'];
$password = $_POST['password'];
$registerDate = date('d-m-Y');


//$data = array( 'name' => $name, 'mail' => $mail, 'password' => $password);

$insert_query = "INSERT INTO users (user_name, user_mail, user_password, register_data) VALUES ($name, $mail, $password, $registerDate)";

?>