<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM schedules WHERE id=$id");
$schedule = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ferry_name = $_POST['ferry_name'];
    $departure = $_POST['departure'];
    $arrival = $_POST['arrival'];
    $route = $_POST['route'];

    $conn->query("UPDATE schedules SET ferry_name='$ferry_name', departure='$departure', arrival='$arrival', route='$route' WHERE id=$id");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Schedule</title>
</head>
<body>
    <h1>Edit Ferry Schedule</h1>
    <form method="POST">
        <label>Ferry Name:</label>
        <input type="text" name="ferry_name" value="<?= $schedule['ferry_name'] ?>" required><br>
        <label>Departure:</label>
        <input type="datetime-local" name="departure" value="<?= date('Y-m-d\TH:i', strtotime($schedule['departure'])) ?>" required><br>
        <label>Arrival:</label>
        <input type="datetime-local" name="arrival" value="<?= date('Y-m-d\TH:i', strtotime($schedule['arrival'])) ?>" required><br>
        <label>Route:</label>
        <input type="text" name="route" value="<?= $schedule['route'] ?>" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
