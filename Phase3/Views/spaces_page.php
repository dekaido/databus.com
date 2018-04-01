<?php

echo "Welcome to the Space Page <br>";
$space_name = $_POST[space_name];
$street = $_POST["street"];
$apt = $_POST[apt];
$state = $_POST["state"];
$zipcode = $_POST[zipcode];
$availability_from = $_POST[];
$availability_till = $_POST[];
$categories = $_POST[];
$PricePerHour = $POST[price];
$description = $POST["description"];
$Amenities = $POST[];
$Pictures = $POST[pic];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Data_bus_V2.0"

//Creating Connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
//Checking Connection
if (!$conn) {
  die("Connection Failed: " .mysqli_connect_error());
}

$sql = "INSERT INTO '$Space_name' (space_name,street,apt,state,zipcode,availability_from,availability_till,categories,price,description,amenities,pic) VALUES('".$space_name"','".$street"'','.$apt','".$state"'','.$zipcode','.$availability_from','.$availability_till','".$categories",'.$price','".$description"'','".$amenities"'','.$pic')

if (mysqli_query($conn, $sql)) {
  echo "Congratulations, New Space created successfully";
} else {
  echo "Error: " .$sql ."<br>" .mysqli_error($conn);
}

mysqli_close($conn);
?>
