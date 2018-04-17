<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 4/1/18
 * Time: 8:37 PM
 */
session_start();
$server = "localhost";
$username = "root";
$password = "";
$database = "database_phase3";

if (isset($_SESSION['first_name'])) {
    $ti = $_SESSION['first_name'];
    $email = $_SESSION['email'];
} else {
    // not logged in
    $ti = "User has logged out";
}
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
    <title>$ti 's Page </title>
</head>
<body>
<div class=\"topnav\">
    <a class=\"normal\" href=\"index.php\">Databus.com</a>
    
    <a class=\"right\" href=\"logout.php\">Logout</a>
    <a class=\"right\" style=\"background-color: #2196F3; color: white;\" >$ti</a>
    <form action='search.php' method='post'>
    <input type=\"search\" name='search' placeholder=\"Search space now...\">
    </form>
</div>


</body>
</html>";
$connect = mysqli_connect($server, $username, $password, $database);
if(mysqli_connect_error())
{
    die("connection failed:" . mysqli_connect_error());
}
$sql_get_username_password = "SELECT vendor_id, first_name, last_name, email, phone_number, company, balance FROM VENDOR WHERE email = '$email';";

$user_name_result = mysqli_query($connect, $sql_get_username_password);
$row = mysqli_fetch_assoc($user_name_result);
if ($row["company"] == ""){
    $sql_get_username_password = "SELECT regular_id, first_name, last_name, email, phone_number, points, regular_addr_id FROM Regular WHERE email = '$email';";
    $user_name_result = mysqli_query($connect, $sql_get_username_password);
    $row = mysqli_fetch_assoc($user_name_result);
    $last_name = $row["last_name"];
    $phone = $row["phone_number"];
    $id_reg = $row["regular_id"];
    $points = $row["points"];
    echo"
        <div class=\"container\">
            <div class=\"list-group\" style=\"padding: 50px 50px\">
             <a class=\"list-group-item active\">This is $ti's Regular Membership</a>
             <a class=\"list-group-item\">Regular ID: 00000$id_reg</a>
             <a class=\"list-group-item\">Full name: $ti   $last_name</a>
             <a class=\"list-group-item\">Email address: $email</a>
             <a class=\"list-group-item\">Phone Number: $phone </a>
             <a class=\"list-group-item\">Your Points: $points </a>
        </div>
</div>
 
    ";

    echo"
        <div class=\"container\">
            <div class=\"list-group\" style=\"padding: 50px 50px\">
             <a class=\"list-group-item active\" style='background-color: hotpink; border-color: hotpink'>Your Orders</a>
             <a class=\"list-group-item\">There is no order currently</a>
             
        </div>
</div>
 
    ";

    echo"
        <div class=\"container\">
            <div class=\"list-group\" style=\"padding: 50px 50px\">
             <a class=\"list-group-item active\" style='background-color: #1ec64c; border-color: #1ec64c'>Your Address Info</a>
             
            ";


    if ($row["regular_addr_id"] == 0){
        echo"<a class=\"list-group-item\">You did not set up your address</a> ";
        echo "<a onclick='showAddr()' class=\"btn btn-info\" role=\"button\">Add one address</a> 
        
        <div style='display: none' id='addr'>
        
        <form action=\"add_addr.php\" method=\"post\" style=\" width: 49%;height: 500px; float: left;\">

    <br>Street: 
    <input type=\"text\" name=\"street\" placeholder=\"Oakwood Ave\">
    
    <br>Apt: 
    <input type=\"text\" name=\"apt\" placeholder=\"202\">
    
    <br>Zipcode: 
    <input type=\"number\" name=\"zipcode\" placeholder=\"16803\">
    
    <br>State:
    
    <input type=\"text\" name=\"state\" placeholder=\"PA\">
    <br>
    <input type=\"submit\" class=\"btn btn-warning\" value=\"Add to my Address\">

</form>

</div>
        
        <script>
function showAddr() {
    var x = document.getElementById(\"addr\");
    if (x.style.display === \"none\") {
        x.style.display = \"block\";
    } else {
        x.style.display = \"none\";
    }
    
} 
</script>
";

    } else {
        $addr_id = $row["regular_addr_id"];
        $addr = "SELECT street, apt, zip_code, state FROM user_addr WHERE user_addr_id = '$addr_id';";

        $addr_result = mysqli_query($connect, $addr);

        $row_addr = mysqli_fetch_assoc($addr_result);
        $street = $row_addr["street"];
        $apt = $row_addr["apt"];
        $zipcode = $row_addr["zip_code"];
        $state = $row_addr["state"];


        echo"<a class=\"list-group-item\">Street: $street</a>";
        echo"<a class=\"list-group-item\">Apt: $apt</a>";
        echo"<a class=\"list-group-item\">Zipcode: $zipcode</a>";
        echo"<a class=\"list-group-item\">State: $state</a>";
        echo"<form action=\"del_addr.php\" method=\"post\" style=\" width: 49%;height: 200px; float: left;\">";
        echo "<input type=\"submit\" class=\"btn btn-primary\" value=\"Delete my Address\">";
        echo"</form>";
    }
    echo "
        </div>
</div>
 
    ";

}
else{

    $last_name = $row["last_name"];
    $phone = $row["phone_number"];
    $company = $row["company"];
    $id_ven = $row["vendor_id"];
    $balance = $row["balance"];
    echo"
        <div class=\"container\">
            <div class=\"list-group\" style=\"padding: 30px 50px\">
             <a class=\"list-group-item active\" style='background-color: #e96023; border-color: #e96203'>This is $ti's Vendor Membership</a>
             <a class=\"list-group-item\">Vendor ID: 00000$id_ven</a>
             <a class=\"list-group-item\">Full name: $ti   $last_name</a>
             <a class=\"list-group-item\">Email address: $email</a>
             <a class=\"list-group-item\">Phone Number: $phone </a>
             <a class=\"list-group-item\">Your Vendor Company: $company </a>
             <a class=\"list-group-item\">Balance: $$balance </a>
        </div>
</div>
 
    ";

    echo"
        <div class=\"container\">
            <div class=\"list-group\" style=\"padding: 30px 50px\">
             <a class=\"list-group-item active\" style='background-color: #1ec64c; border-color: #1ec64c'>Your Transaction</a>
             <a class=\"list-group-item\">You currently do not have setup payment</a>
            
        </div>
</div>
 
    ";

    $space = "SELECT * FROM space WHERE vendor_id = '$id_ven'";

    $space_result = mysqli_query($connect, $space);

    $count = mysqli_num_rows($space_result);

    if ($count == 0) {

        echo "
        <div class=\"container\">
            <div class=\"list-group\" style=\"padding: 30px 50px\">
             <a class=\"list-group-item active\" style='background-color: #2ba0c6; border-color: #2ba0c6'>Your Space</a>
             <a class=\"list-group-item\">You currently do not have a space listing</a>
            
        
        <a onclick='showAddr()' class=\"btn btn-info\" role=\"button\">Add One Space</a> 
        
        <div style='display: none' id='addr'>
        
    
    <form action=\"add_space.php\" method=\"post\" style=\" width: 49%;height: 400px; float: left;\">
  Space Name: <input type= \"text\" name=\"space_name\"><br>
<!-- Space Name -->

  Street Address:
  <input type= \"text\" name=\"street\"><br>
<!-- Street Address -->

  Room Number:
  <input type= \"number\" name=\"apt\"><br>
<!-- Apartment Number: -->

  State:
  <input type= \"text\" name=\"state\"><br>
<!-- State -->

  Zip Code:
  <input type= \"number\" name=\"zipcode\" pattern \"[0-9]{5}\"><br>
<!-- Zip Code -->

  Availability <br>
  From:
  <input type= \"datetime-local\" name=\"from\"><br>
  Till:
  <input type= \"datetime-local\" name=\"till\"><br>
<!-- Availability -->

 This is a 
 <select type='number' name='categories'>
 <option value='0'>Hotel</option>
 <option value='1'>Business Room</option>
 <option value='2'>University</option>
 <option value='3'>Private Property</option>
 </select>
  Property
 <br>
 Accomodation Capacity
<input type=\"number\" name= \"size\">
<!-- Categories -->
</select>
    <br>
  Price Per Hour:
  <input type= \"number\" name=\"price\"><br>
<!-- Price -->


  Small Description:
  <input type= \"text\" name=\"description\"><br>

  Amenities
  <input type= \"text\" name=\"amenities\"><br>
<!-- Amenities -->

<!--
  Pictures
  <input type=\"file\" name=\"pic\" accept=\"image/*\"> <br>
  <br>
 Images -->
  <input type=\"submit\" class=\"btn btn-warning\" value=\"Add this space\">

</form>
</div>

</div>
        
        <script>
function showAddr() {
    var x = document.getElementById(\"add\");
    if (x.style.display === \"none\") {
        x.style.display = \"block\";
    } else {
        x.style.display = \"none\";
    }
} 
</script>
        
</div>
 
    ";
    }
    else{

        for ($x = 1; $x <= $count; $x++) {
            $ven_row = mysqli_fetch_assoc($space_result);
            $space_i = $ven_row['Space_id'];
            $sname = $ven_row['space_name'];
            $start_time = $ven_row['resv_start_date'];
            $end_time = $ven_row['resv_end_date'];

            $s_addr_sql = "SELECT * FROM space_addr WHERE space_addr_id = '$space_i';";
            $s_addr_result = mysqli_query($connect, $s_addr_sql);
            $s_addr_row = mysqli_fetch_assoc($s_addr_result);
            $s_street = $s_addr_row['street'];
            $s_room = $s_addr_row['room'];
            $s_state = $s_addr_row['state'];
            $s_zipcode = $s_addr_row['zip_code'];
            $s_company = $s_addr_row['company'];



            if ($s_company == ""){
                echo "
            <div class=\"container\">
            <div class=\"list-group\" style=\"padding: 30px 50px\">
             <a class=\"list-group-item active\" style='background-color: #2ba0c6; border-color: #2ba0c6'>Your Space $x out of $count </a>
             
             <a class=\"list-group-item\">Space ID: 00000$space_i </a> 
             <a class=\"list-group-item\">Space name: $sname  <button class= \" btn btn-danger\" role='button' style='margin-left: 0px;'>Pending</button></a>
            <a class=\"list-group-item\">Renting Time: $start_time  To  $end_time </a>
            <a class=\"list-group-item\">Space Address: Room $s_room, $s_street, $s_state, $s_zipcode </a>
             
             ";
            } else {
                echo "
            <div class=\"container\">
            <div class=\"list-group\" style=\"padding: 30px 50px\">
             <a class=\"list-group-item active\" style='background-color: #2ba0c6; border-color: #2ba0c6'>Your Space $x out of $count </a>
             
             <a class=\"list-group-item\">Space ID: 00000$space_i </a> 
             <a class=\"list-group-item\">Space name: $sname  <button class= \" btn btn-success\" role='button' style='margin-left: 20px;'>Verified by $s_company</button></a>
            <a class=\"list-group-item\">Renting Time: $start_time  To  $end_time </a>
            <a class=\"list-group-item\">Space Address: Room $s_room, $s_street, $s_state, $s_zipcode </a>
             
             ";
            }

            if ($x == $count){
                echo "
        <a onclick='showAddr()' class=\"btn btn-info\" role=\"button\">Add another Space</a> 
        
        <div style='display: none' id='add'>
        
    
    <form action=\"add_space.php\" method=\"post\" style=\" width: 49%;height: 400px; float: left;\">
  Space Name: <input type= \"text\" name=\"space_name\"><br>
<!-- Space Name -->

  Street Address:
  <input type= \"text\" name=\"street\"><br>
<!-- Street Address -->

  Room Number:
  <input type= \"number\" name=\"apt\"><br>
<!-- Apartment Number: -->

  State:
  <input type= \"text\" name=\"state\"><br>
<!-- State -->

  Zip Code:
  <input type= \"number\" name=\"zipcode\" pattern \"[0-9]{5}\"><br>
<!-- Zip Code -->

  Availability <br>
  From:
  <input type= \"datetime-local\" name=\"from\"><br>
  Till:
  <input type= \"datetime-local\" name=\"till\"><br>
<!-- Availability -->

 This is a 
 <select type='number' name='categories'>
 <option value='0'>Hotel</option>
 <option value='1'>Business Room</option>
 <option value='2'>University</option>
 <option value='3'>Private Property</option>
 </select>
  Property
 <br>
 Accomodation Capacity
<input type=\"number\" name= \"size\">
<!-- Categories -->
</select>
    <br>
  Price Per Hour:
  <input type= \"number\" name=\"price\"><br>
<!-- Price -->


  Small Description:
  <input type= \"text\" name=\"description\"><br>

  Amenities
  <input type= \"text\" name=\"amenities\"><br>
<!-- Amenities -->

<!--
  Pictures
  <input type=\"file\" name=\"pic\" accept=\"image/*\"> <br>
  <br>
 Images -->
  <input type=\"submit\" class=\"btn btn-warning\" value=\"Add this space\">

</form>
</div>

</div>
          <script>
function showAddr() {
    var x = document.getElementById(\"add\");
    if (x.style.display === \"none\") {
        x.style.display = \"block\";
    } else {
        x.style.display = \"none\";
    }
    
} 
</script>  
            
            
            
            ";

            }

            else {

                echo "</div>

                            </div>";
            }

        }

    }


}


