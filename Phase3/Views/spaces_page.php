<?php

echo "Welcome to the Space Page <br>";
// $space_name = $_POST["space_name"];
// $street = $_POST["street"];
// $apt = $_POST["apt"];
// $state = $_POST["state"];
// $zipcode = $_POST["zipcode"];
// $availability_from = $_POST["from"];
// $availability_till = $_POST["till"];
// $categories = $_POST["categories"];
// $PricePerHour = $_POST["price"];
// $description = $_POST["description"];
// $Amenities = $_POST["amenities"];
// Need to add $Pictures = $POST["pic"];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DatabusSchema";

//Creating Connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
$space_name = mysqli_real_escape_string($conn, $_REQUEST['space_name']);
$street = mysqli_real_escape_string($conn, $_REQUEST['street']);
$apt = mysqli_real_escape_string($conn, $_REQUEST['apt']);
$state = mysqli_real_escape_string($conn, $_REQUEST['state']);
$zipcode = mysqli_real_escape_string($conn, $_REQUEST['zipcode']);
$availability_from = mysqli_real_escape_string($conn, $_REQUEST['from']);
$availability_till = mysqli_real_escape_string($conn, $_REQUEST['till']);
$categories =  mysqli_real_escape_string($conn, $_REQUEST['categories']);
$PricePerHour = mysqli_real_escape_string($conn, $_REQUEST['price']);
$description = mysqli_real_escape_string($conn, $_REQUEST['description']);
$Amenities = mysqli_real_escape_string($conn, $_REQUEST['amenities']);
// $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
// $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
// $pass = mysqli_real_escape_string($conn, $_REQUEST['password']);
// $phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
// $last = mysqli_real_escape_string($conn, $_REQUEST['last']);



//Checking Connection
if (!$conn) {
  die("Connection Failed: " .mysqli_connect_error());
}


//SQL Statements
$sql = "INSERT INTO Space (space_name,resv_start_date,resv_end_date,price,service) VALUES('$space_name','$availability_from','$availability_till','$PricePerHour','$Amenities');";
$sql1 = "INSERT INTO Space_addr (street,room,state,zip_code,) VALUES('$street','$apt','$state','$zipcode');";
$sql2 = "INSERT INTO Sub_category (size) VALUES('$categories');";
$sql3 = "INSERT INTO Pages (Description) VALUES('$description');";


//Connecting SQL Query
//Checking if all required feilds are not filled
if(empty($space_name) || empty($street) || empty($apt) || empty($state) || empty($zipcode) || empty($availability_from) || empty($availability_till) || empty($categories)|| empty($PricePerHour)|| empty($description)|| empty($Amenities))
{
    echo "You did not fill out the required fields.";
}
elseif (mysqli_query($conn, $sql)) {
  echo "Congratulations, New Space created successfully";
} else {
  echo "Error: " .$sql ."<br>" .mysqli_error($conn);
}

mysqli_close($conn);
?>
