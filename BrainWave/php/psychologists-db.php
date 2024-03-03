<?php 

$conn = new mysqli('localhost','root','','BrainWave');
if(!$conn.mysqli_connect_error())
{
    echo "Connection Denied";
}
?>