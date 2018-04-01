<?php

$P_id = 'page1';
//$location =
//$category =
//$size =


$server = "localhost";

$username = "root";
$password = "";
$database = "database_phase3";

$connect = mysqli_connect($server, $username, $password, $database);

if(mysqli_connect_error())
{
  die("connection failed:" . mysqli_connect_error());
}


$sql_insert_user = "INSERT INTO VENDOR (first_name,last_name,email,password,phone_number) VALUES('$_POST["name"]', 'temp_lastname', '$_POST["email"]', '$_POST["password"].', '$_POST["phone"]');";

$dis_result = mysqli_query($connect, $sql_insert_user);

if(!$dis_result){
  die( "sql failed:" . mysqli_error($connect));
}
else
	echo "Signup Successful!";


?>