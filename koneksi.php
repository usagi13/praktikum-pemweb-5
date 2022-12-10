<?php
$conn = new mysqli('localhost','root','','praktikum_5');
if ($conn->connect_error) {
    die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
}
?>