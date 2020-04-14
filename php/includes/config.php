<?php

$servername = "localhost";
$Username = "samlongton";
$Password = "1234567890";
$Name = "samlong_db";

$db = mysqli_connect($servername, $Username, $Password, $Name);

if(!$db){
	die("connection failed: " .mysqli_connect_error());
}