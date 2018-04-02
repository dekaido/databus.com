<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 4/1/18
 * Time: 8:43 PM
 */

session_start();

session_unset();

session_destroy();
header("refresh:2;//localhost/databus/index.html");
echo "Logout Successfully. Redericting...";