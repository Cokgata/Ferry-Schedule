<?php
include 'db.php';

$result = $conn->query("SELECT * FROM schedules");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ferry Schedule</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Ferry Schedules</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="add.php">Add Schedule</a>
        </nav>
    </header>

    <main>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Ferry Name</th>
            <th>Departure</th>
            <th>Arrival</th>
            <th>Route</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['ferry_name'] ?></td>
            <td><?= $row['departure'] ?></td>
            <td><?= $row['arrival'] ?></td>
            <td><?= $row['route'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    </main>
    
    <footer>
    <div class="footer-text">
        <p>&copy; 2024 Ferry Schedules. All rights reserved.</p>
        <p>
            <span class="footer-icon"></span>
            Designed by Tjokorda Gde Dalem Sogata Pemayun
        </p>
        <p>
            <a href="https://www.pelindo.co.id/port/pelabuhan-benoa" target="_blank">Visit our official page</a>
        </p>
    </div>
</footer>

</body>
</html>
