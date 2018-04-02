<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$database = "database_phase3";
$connect = mysqli_connect($server, $username, $password, $database);
$email = mysqli_real_escape_string($connect, $_REQUEST['email']);
$name = mysqli_real_escape_string($connect, $_REQUEST['name']);
$pass = mysqli_real_escape_string($connect, $_REQUEST['password']);
$phone = mysqli_real_escape_string($connect, $_REQUEST['phone']);
$company = mysqli_real_escape_string($connect, $_REQUEST['company']);
$last = mysqli_real_escape_string($connect, $_REQUEST['last']);

if(mysqli_connect_error())
{
    die("connection failed:" . mysqli_connect_error());
}
$sql_insert_user = "INSERT INTO VENDOR(first_name, last_name, email, password, phone_number, company) VALUES('$name', '$last', '$email', '$pass', '$phone', '$company');";
$dis_result = mysqli_query($connect, $sql_insert_user);
if(!$dis_result){
    die( "sql failed:" . mysqli_error($connect));
}
else {
    $_SESSION['email'] = $email;
    $_SESSION['first_name'] = $name;
    header("refresh:2;//localhost/databus/me.php");
    echo "Signup Successful! Redirecting<br>";

}

mysqli_close($connect);
?>