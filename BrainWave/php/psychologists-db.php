<?php 

$conn = new mysqli('localhost','root','','psychologists');
if(!$conn.mysqli_connect_error())
{
    echo "Connection Denied";
}
?>