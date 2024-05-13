<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "datasoh";
$conn = mysqli_connect($host, $user, $pass, $database);
mysqli_set_charset($conn, "utf8");
if ($conn) {
       // code...
}
