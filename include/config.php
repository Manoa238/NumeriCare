<?php
$conn = new mysqli("localhost","root","","numericare");
if ($conn ->connect_error){
    die("Connection failed :" . $conn->connect_error);
}
 ?>
