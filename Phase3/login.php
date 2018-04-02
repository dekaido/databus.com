<?php
session_start();
$email = $_POST["email"];
$user_password = $_POST["password"];
$server = "localhost";
$username = "root";
$password = "";
$database = "database_phase3";
$connect = mysqli_connect($server, $username, $password, $database);
if(mysqli_connect_error())
{
    die("connection failed:" . mysqli_connect_error());
}
$sql_get_username_password = "SELECT first_name, password FROM VENDOR WHERE email = '$email';";
$user_name_result = mysqli_query($connect, $sql_get_username_password);
if(!$user_name_result){
    echo mysqli_error($connect);
}else{
    if (mysqli_num_rows($user_name_result) <= 0){
        $sql_get_username_password = "SELECT first_name, password FROM REGULAR WHERE email = '$email';";
        $user_name_result = mysqli_query($connect, $sql_get_username_password);
        if (mysqli_num_rows($user_name_result) <= 0) {
            echo "0 results <br>";
            header("refresh:3;//localhost/databus/login.html");
            print "Wrong Username. Redirecting...<br>";
        }
        else{
            $row = mysqli_fetch_assoc($user_name_result);
            print "username   " . $row["first_name"] . "<br>";
        }
    }
    else{
        $row = mysqli_fetch_assoc($user_name_result);
        print "username   " . $row["first_name"] . "<br>";
    }
    if ($row["password"] == $user_password){

        $_SESSION['email'] = $email;
        $_SESSION['first_name'] = $row["first_name"];
        header("refresh:3;//localhost/databus/me.php");
        print "Login Successfully! Redirecting...<br>";

    }else{
        header("refresh:3;//localhost/databus/login.html");
        print "Not correct! Please try again. Redirecting...<br>";

    }
}
mysqli_close($connect);
