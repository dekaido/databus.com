<?php

echo "Welcome to the Space Page <br>";
$space_name = $_POST[space_name];
$street = $_POST["street"];
$apt = $_POST["apt"];
$state = $_POST["state"];
$zipcode = $_POST["zipcode"];
$availability_from = $_POST["from"];
$availability_till = $_POST["till"];
$categories = $_POST["Categories"];
$PricePerHour = $POST["price"];
$description = $POST["description"];
$Amenities = $POST["amenities"];
// Need to add $Pictures = $POST["pic"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database_phase3"

//Creating Connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
//Checking Connection
if (!$conn) {
  die("Connection Failed: " .mysqli_connect_error());
}
//SQL Statements 
$sql = "INSERT INTO Space (space_name,resv_start_date,resv_end_date,price,service) VALUES('$_POST["space_name"]','$_POST["from"]','$_POST["till"]'','$_POST["price"]','$_POST[amenities]');";
$sql1 = "INSERT INTO Space_addr (street,room,state,zip_code,) VALUES('$_POST[".$street"]','$_POST[".$apt"]','$_POST[".$state"]'','$_POST[".$zipcode"]');";
$sql2 = "INSERT INTO Sub_category (size) VALUES('$_POST[".$categories"]');";
$sql3 = "INSERT INTO Pages (Description) VALUES('$_POST[".$description"]');";


if (mysqli_query($conn, $sql)) {
  echo "Congratulations, New Space created successfully";
} else {
  echo "Error: " .$sql ."<br>" .mysqli_error($conn);
}

mysqli_close($conn);
?>
