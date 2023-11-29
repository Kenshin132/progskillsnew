<?php
require_once("dbConnection.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM rooms WHERE room_id = '$id'");
header("Location:index.php");
?>
