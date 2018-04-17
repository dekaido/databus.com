<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 4/10/18
 * Time: 8:00 PM
 */

session_start();
$server = "localhost";
$username = "root";
$password = "";
$database = "database_phase3";

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


<div class=\"jumbotron\" style=\"margin-bottom: 0px;background: linear-gradient(141deg, #0fb8ad 0%, #1fc8db 51%, #2cb5e8 75%); border: none;\" >

  <div class=\"container text-center\" style=\" background: transparent\">
    <h1 style=\"color: beige;\">Databus.com</h1>      
    <p style=\"color: aliceblue;\">A place where you can reserve professional space</p>
  </div>
</div>
<img src=\"indexpic.jpg\" style=\"max-width: 100%; height: auto; \">
<div class=\"jumbotron\" >

  <div class=\"container text-center\" style=\"background: transparent\">
    <h1>Best Deals</h1>      
    <p>Here is our Weekly Deals</p>
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
    <h1 style=\"color: beige;\">Databus.com</h1>      
    <p style=\"color: aliceblue;\">A place where you can reserve professional space</p>
  </div>
</div>
<img src=\"indexpic.jpg\" style=\"max-width: 100%; height: auto; \">
<div class=\"jumbotron\" >

  <div class=\"container text-center\" style=\"background: transparent\">
    <h1>Best Deals</h1>      
    <p>Here is our Weekly Deals</p>
  </div>
</div>

</body>
</html>

</body>
</html>
    ";
}