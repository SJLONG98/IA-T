<?php
session_start();
require 'config.php';

$sql = "SELECT *requests r, items i, users u WHERE u.personId = r.personId AND claimed ='Y' AND r.id = i.id";
$result = $db->query($Sql);

?>