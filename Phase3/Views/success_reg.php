<html>
<body>
<?php

// Connect to server-database
	DEFINE('DB_USERNAME', 'root');
	DEFINE('DB_PASSWORD', 'root');
	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_DATABASE', 'databus_schema');
/*
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "";
*/

$connect = mysqli_connect($server,$username,$password,$database);

if(mysqli_connect_error())
{
	die("Connection failed: " . mysqli_connect_error());	
}


// Temp save all user input to php,hash password
$firstname = trim($_POST["firstname"]);
$lastname = trim($_POST["lastname"]);
$email = $_POST["email"];
$password = password_hash(trim($_POST["password"]),PASSWORD_BCRYPT,$options);
$phone = $_POST["phoneno"];
$usertype = $_POST["usertype"].value;


// SQL commands to send to server

// Check email duplicates
$cmd1 = "SELECT * FROM '$usertype' WHERE email = '$email'";
$res1 = mysqli_query($connect,$cmd1);

if(mysqli_num_rows($res1) > 0)
{
	$emailErr = "Cannot create account with existing email address."
}

// Add new registered user to database
$cmd2 = "INSERT INTO '$usertype' (first_name,last_name,email,password,phone_number) value('".$firstname."', '".$lastname."', '".$email."','".$hashpass."', '".$phone."')";
$res2 = mysqli_query($connect, $sql_1);

if($res2)
{
	echo "Registration successful!";
	echo "<h2>Welcome to Databus.com,</h2> " . $first . "!<br><br>";
}




/*
// Php input validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstnameErr = "First name is required.";
  } else {
    $first = trim($_POST["firstname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed.";
    }
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["lastname"])) {
    $lastnameErr = "Last name is required.";
  } else {
    $last = trim($_POST["lastname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed.";
    }
  }

if (empty($_POST["email"])) {
    $emailErr = "Email is empty.";
  } else {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email address.";
    }
  }

if (empty($_POST["password"])) {
    $passErr = "Password is empty.";
  } else {
    $password = $_POST["password"];
    // check if password contains a symbol and number
    if (preg_match("/^*$/",$password)) {
      $passErr = "Password is missing a symbol.";
    }
    if (preg_match("0-9",$password)) {
      $passErr = "Password is missing a number.";
    }    
  }

if (empty($_POST["usertype"])) {
    $typeErr = "User type not selected.";
  } else {
    $usertype = $_POST["usertype"];
  }
*/
	



</body>
</html>
?>
