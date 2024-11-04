<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("INSERT INTO hospitals (name, address, city, phone_number, type, email, website, service, open_close_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['name'],
        $_POST['address'],
        $_POST['city'],
        $_POST['phone_number'],
        $_POST['type'],
        $_POST['email'],
        $_POST['website'],
        $_POST['service'],
        $_POST['open_close_time']
    ]);

    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Hospital</title>
    <link rel="stylesheet" href="styles.css">
    <style>
body {
    font-family: Arial;
    background-color: #f4f4f9;
    }

h2 {
    text-align: center;
   }

form {
    max-width: 500px;
    margin: 20px auto;
    background: #ffffff;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    font-weight: bold;
    }

input[type="text"],
input[type="email"],
input[type="url"],
select {
    width: calc(100% - 22px);
    padding: 10px;
    margin-bottom: 15px;
   }

button {
    display: block;
    width: 50%;
    background-color: #7f00ff;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
   }

button:hover {
    background-color: #5e00cc;
}

a {
    display: block;
    text-align: center;
    margin-top: 15px;
    text-decoration: none;
    color: #7f00ff;
    font-size: 14px;
}
</style>
</head>
<body>
<h2>Add New Hospital</h2>
    <form method="POST" action="">
        <label>Name: <input type="text" name="name" required></label><br></br>
        <label>Address: <input type="text" name="address" required></label><br></br>
        <label>City: <input type="text" name="city" required></label><br></br>
        <label>Phone Number: <input type="text" name="phone_number" required></label><br></br>
        <label>Type: 
            <select name="type">
                <option value="Private">Private</option>
                <option value="Government">Government</option>
            </select>
        </label><br></br>
        <label>Email: <input type="email" name="email" required></label><br></br>
        <label>Website: <input type="url" name="website"></label><br></br>
        <label>Service: <input type="text" name="service"></label><br></br>
        <label>Open-Close Time: <input type="text" name="open_close_time"></label><br></br>
        <button type="submit">Add Hospital</button>
    </form></br></br>
    <a href="admin_dashboard.php">Back to Dashboard</a>
</body>
</html>