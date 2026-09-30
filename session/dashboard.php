<?php
session_start();

// Restrict dashboard access
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION["username"];
$loginTime = $_SESSION["login_time"] ?? "N/A";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="card dashboard">
        <h1>Welcome, <?= htmlspecialchars($username) ?>!</h1>

        <p>You have successfully logged in.</p>

        <div class="info">
            <p><strong>Username:</strong> <?= htmlspecialchars($username) ?></p>
            <p><strong>Login Time:</strong> <?= htmlspecialchars($loginTime) ?></p>
            <p><strong>Session Status:</strong> Active</p>
        </div>

        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</div>

</body>
</html>