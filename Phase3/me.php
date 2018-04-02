<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 4/1/18
 * Time: 8:37 PM
 */
session_start();
$server = "localhost";
$username = "root";
$password = "";
$database = "database_phase3";

if (isset($_SESSION['first_name'])) {
    $ti = $_SESSION['first_name'];
    $email = $_SESSION['email'];
} else {
    // not logged in
    $ti = "User has logged out";
}
echo "
    <!DOCTYPE html>
<html lang=\"en\">

<head>
    <meta charset=\"UTF-8\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"indexStyle.css\">
    <title>$ti 's Page </title>
</head>
<body>
<div class=\"topnav\">
    <a class=\"active\" href=\"index.html\">Databus.com</a>
    
    <a class=\"right\" href=\"logout.php\">Logout</a>
    <a class=\"right\" >$ti</a>
    <input type=\"text\" placeholder=\"Search space now...\">
</div>

<h1>This is $ti's Page</h1>


</body>
</html>";
$connect = mysqli_connect($server, $username, $password, $database);
if(mysqli_connect_error())
{
    die("connection failed:" . mysqli_connect_error());
}
$sql_get_username_password = "SELECT first_name, last_name, email, phone_number, company FROM VENDOR WHERE email = '$email';";

$user_name_result = mysqli_query($connect, $sql_get_username_password);
$row = mysqli_fetch_assoc($user_name_result);
if ($row["company"] == ""){
    $sql_get_username_password = "SELECT first_name, last_name, email, phone_number FROM Regular WHERE email = '$email';";
    $user_name_result = mysqli_query($connect, $sql_get_username_password);
    $row = mysqli_fetch_assoc($user_name_result);
    $last_name = $row["last_name"];
    $phone = $row["phone_number"];

    echo "<h2>Full name: $ti   $last_name<br></h2>";
    echo "<h2>Email address: $email <br></h2>";
    echo "<h2>Phone Number: $phone <br></h2>";
}
else{

    $last_name = $row["last_name"];
    $phone = $row["phone_number"];
    $company = $row["company"];

    echo "<h2>Full name: $ti   $last_name<br></h2>";
    echo "<h2>Email address: $email <br></h2>";
    echo "<h2>Phone Number: $phone <br></h2>";
    echo "<h2>Your Vendor Company: $company<br></h2>";
}


