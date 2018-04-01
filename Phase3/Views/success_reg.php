<?php
<html>
<body>

$server = "localhost";

$username = "root";
$password = "";
$database = "database_phase3";

$connect = mysqli_connect($server, $username, $password, $database);


if(mysqli_connect_error())
{
	die("Connection failed: " . mysqli_connect_error());	
}
else
	echo "Connection successful.";


// Temp save all user input to php,hash password
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$password = $_POST["password"];
//$password = password_hash(trim($_POST["password"]),PASSWORD_BCRYPT,$options);
$phone = $_POST["phoneno"];
$usertype = $_POST["usertype"].value;


// SQL commands to send to server

// Check email duplicates
$cmd1 = "SELECT * FROM '$usertype' WHERE email = '$email'";
$res1 = mysqli_query($connect,$cmd1);

if(mysqli_num_rows($res1) > 0)
{
	$emailErr = "Cannot create account with existing email address.";
}

// Add new registered user to database
$cmd2 = "INSERT INTO '$usertype' (first_name,last_name,email,password,phone_number) value('".$firstname."', '".$lastname."', '".$email."','".$hashpass."', '".$phone."')";
$res2 = mysqli_query($connect, $sql_1);

if($res2)
{
	echo "Registration successful!";
	echo "<h2>Welcome to Databus.com,</h2> " . $first . "!<br><br>";
}

</body>
</html>
?>
