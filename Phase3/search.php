<?php
session_start();
$search = $_POST["search"];
$server = "localhost";
$username = "root";
$password = "";
$database = "database_phase3";
$connect = mysqli_connect($server, $username, $password, $database);

if(mysqli_connect_error())
{
    die("connection failed:" . mysqli_connect_error());
}
$sql_get_search_result = "SELECT * FROM space;";
$search_result = mysqli_query($connect, $sql_get_search_result);
$result_count = 0;
$user_input = mysqli_escape_string($connect, $_REQUEST['search']);
$isresult = 0;

for ($x = 0; $x < mysqli_num_rows($search_result); $x++) {

    $current_search = mysqli_fetch_assoc($search_result);
    $csname = $current_search['space_name'];


}

if (isset($_SESSION['first_name'])) {
    $ti = $_SESSION['first_name'];
    echo "
    
<!DOCTYPE html>
<html lang=\"en\">

<head>
    <meta charset=\"UTF-8\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"indexStyle.css\">
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">

    <!-- jQuery library -->
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>

    <!-- Latest compiled JavaScript -->
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
    <title>Databus.com</title>


</head>
<body>
<div class=\"topnav\">
    <a class=\"active\" href=\"index.php\">Databus.com</a>
    <a class=\"normal\" href=\"\">Our Spaces</a>
    <a class=\"normal\" href=\"\">Cities</a>
    <a class=\"normal\" href=\"\">Top Picks</a>
    <a class=\"right\" href='logout.php'>Logout </a>
    <a class=\"right\" style=\"background-color: #2196F3; color: white;\" href=\"me.php\">$ti</a>
    <form action='search.php' method='post'>
    <input type=\"search\" name='search' placeholder=\"Search space now...\">
    </form>
</div>


<div class=\"jumbotron\" style=\"margin-bottom: 0px;background: linear-gradient(141deg, #343232 0%, #0b4147 51%, #104255 75%); border: none;\" >

  <div class=\"container text-center\" style=\" background: transparent\">
    <h1 style=\"color: beige;\">Your Search result for $user_input</h1>      
  </div>
</div>

</body>
</html>
    ";
} else {
    // not logged in











    echo "
    <!DOCTYPE html>
<html lang=\"en\">

<head>
    <meta charset=\"UTF-8\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"indexStyle.css\">
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">

    <!-- jQuery library -->
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>

    <!-- Latest compiled JavaScript -->
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
    <title>Databus.com</title>


</head>
<body>
<div class=\"topnav\">
    <a class=\"active\" href=\"index.php\">Databus.com</a>
    <a class=\"normal\" href=\"\">Our Spaces</a>
    <a class=\"normal\" href=\"\">Cities</a>
    <a class=\"normal\" href=\"\">Top Picks</a>
    <a class=\"right\" href=\"login.html\">Login</a>
    <a class=\"right\" href=\"Signup.html\">Signup</a>
    <form action='search.php' method='post'>
    <input type=\"search\" name='search' placeholder=\"Search space now...\">
    </form>
</div>


<div class=\"jumbotron\" style=\"margin-bottom: 0px;background: linear-gradient(141deg, #0fb8ad 0%, #1fc8db 51%, #2cb5e8 75%); border: none;\" >

  <div class=\"container text-center\" style=\" background: transparent\">
    <h1 style=\"color: beige;\">Your Search result for: $search_result</h1>      
  </div>
</div>
    ";}



if($result_count = 0){

    echo "


        <div class=\"container\">
        <div class=\"row\">
        <div class=\"gallery col-lg-12 col-md-12 col-sm-12 col-xs-12\">
            <h1 class=\"gallery-title\">Sorry, we could not find the result!</h1>
        </div>

       ";
}else{




}
mysqli_close($connect);
