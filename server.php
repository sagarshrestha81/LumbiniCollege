<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "lumbini";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn) {
    echo "connected";
} else {
    echo "not";
}

?>