<?php
include 'db.php';

$id = $_GET['id'];
$conn->query("DELETE FROM schedules WHERE id=$id");
header('Location: index.php');
?>
