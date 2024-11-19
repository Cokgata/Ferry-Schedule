<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ferry_name = $_POST['ferry_name'];
    $departure = $_POST['departure'];
    $arrival = $_POST['arrival'];
    $route = $_POST['route'];

    $conn->query("INSERT INTO schedules (ferry_name, departure, arrival, route) VALUES ('$ferry_name', '$departure', '$arrival', '$route')");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Schedule</title>
</head>
<body>
    <h1>Add Ferry Schedule</h1>
    <form method="POST">
        <label>Ferry Name:</label>
        <input type="text" name="ferry_name" required><br>
        <label>Departure:</label>
        <input type="datetime-local" name="departure" required><br>
        <label>Arrival:</label>
        <input type="datetime-local" name="arrival" required><br>
        <label>Route:</label>
        <input type="text" name="route" required><br>
        <button type="submit">Add</button>
    </form>
</body>
</html>
