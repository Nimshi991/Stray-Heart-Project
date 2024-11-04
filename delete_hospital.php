<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

include 'config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM hospitals WHERE id = ?");
$stmt->execute([$id]);

header("Location:admin_dashboard.php");
exit();
?>

