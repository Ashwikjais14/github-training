<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION["email"];
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

        <h1>Welcome!</h1>

        <p>You have successfully logged in.</p>

        <div class="info">
            <p>
                <strong>Email:</strong>
                <?= htmlspecialchars($email) ?>
            </p>

            <p>
                <strong>Remember Me:</strong>
                Cookie enabled for 7 days
            </p>
        </div>

        <a href="logout.php" class="logout-btn">
            Logout
        </a>

    </div>

</div>

</body>
</html>