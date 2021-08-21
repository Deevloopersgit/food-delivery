<?php
session_start();
session_regenerate_id();
$con = mysqli_connect("localhost","root","","food_delivery");
?>