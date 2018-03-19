<?php

echo "hello, this is user/vender login page<br>";

$email = $_POST["email"];
$user_password = $_POST["password"];

echo "email : " . $email . "<br>";

$server = "localhost";

$username = "root";
$password = "";
$database = "Data_bus_V2.0";

$connect = mysqli_connect($server, $username, $password, $database);

if(mysqli_connect_error())
{
  die("connection failed:" . mysqli_connect_error());
}

$sql_get_username_password = "SELECT user_name, password FROM Users WHERE email = '$email';";
//$sql_get_password = "SELECT user_name FROM Users WHER;";

$user_name_result = mysqli_query($connect, $sql_get_username_password);
if(!$user_name_result){
  echo mysqli_error($connect);
}else{
  if (mysqli_num_rows($user_name_result) <= 0){
    echo "0 results";
  }
  else{
    $row = mysqli_fetch_assoc($user_name_result);
    print "username   " . $row["user_name"] . "<br>";
    print "password   " . $row["password"] . "<br>";
  }

  echo "password is :" . $user_password . "<br>";
  if ($row["password"] == $user_password){
    header('Location: http://localhost/Databus.com/auth_pass.html');
    echo "password correct!<br>";
  }else{
    echo "not correct! <br>";
  }
}

mysqli_close($connect);
?>
