<?php
$user="a3001738_dhami";
$pw="Toiohomai1234";
$db="a3001738_amrit";
$connection = new mysqli('localhost', $user, $pw, $db) or die(mysqli_error($connection));
$result = $connection->query("select * from pages") or die($connection->error());

?>