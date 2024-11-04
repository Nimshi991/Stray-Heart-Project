<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

include 'config.php';

$stmt = $conn->prepare("SELECT * FROM hospitals");
$stmt->execute();
$hospitals = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
body {
    font-family: Arial;
    background-color: #f4f4f9;
    }

h2 {
    text-align: center;
    }

a {
    display: block;
    text-align: center;
    margin-top: 15px;
    text-decoration: none;
    color: #7f00ff;
    font-size: 14px;
}

table {
    width: 60%;
    margin: 20px auto;
    border-collapse: collapse;
    background: #fff;
}

th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}
</style>
</head>
<body>
<h2>Manage Hospitals</h2>
    <a href="add_hospital.php">Add New Hospital</a></br></br>
    <a href="edit_hospital.php">Edit Exiting Hospital</a></br></br>
    <a href="delete_hospital.php">Delete Exiting Hospital</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Phone Number</th>
                <th>Type</th>
                <th>Email</th>
                <th>Website</th>
                <th>Service</th>
                <th>Open-Close Time</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($hospitals as $hospital) : ?>
                <tr>
                    <td><?= $hospital['id']; ?></td>
                    <td><?= $hospital['name']; ?></td>
                    <td><?= $hospital['address']; ?></td>
                    <td><?= $hospital['city']; ?></td>
                    <td><?= $hospital['phone_number']; ?></td>
                    <td><?= $hospital['type']; ?></td>
                    <td><?= $hospital['email']; ?></td>
                    <td><a href="<?= $hospital['website']; ?>">Visit</a></td>
                    <td><?= $hospital['service']; ?></td>
                    <td><?= $hospital['open_close_time']; ?></td>
                    <td>
                        <a href="edit_hospital.php?id=<?= $hospital['id']; ?>">Edit</a>
                        <a href="delete_hospital.php?id=<?= $hospital['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>