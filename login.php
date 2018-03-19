<?php
function get_username_and_password($email)
{
  echo "hello, this is user/vender login page<br>";

  //$email = $_POST["email"];

  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "Data_bus_V2.0";

  $connect = mysqli_connect($server, $username, $password, $database);

  if(mysqli_connect_error())
  {
    die("connection failed:" . mysqli_connect_error());
  }

  $sql_get_username_password = "SELECT user_name, password FROM Users WHERE email = $email;";
  //$sql_get_password = "SELECT user_name FROM Users WHER;";

  $user_name_result = mysqli_query($connect, $sql_get_username_password);

  if (mysqli_num_rows($user_name_result) <= 0){
    echo "o results";
  }
  else{
    $row = mysqli_fetch_assoc($user_name_result);
    print "username   " . $row["user_name"] . "<br>";
    print "password   " . $row["password"] . "<br>";
  }



  mysqli_close($connect)


}



?>
