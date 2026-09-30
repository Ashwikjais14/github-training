<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    // Demo credentials
    $validUsername = "admin";
    $validPassword = "12345";

    if ($username === $validUsername && $password === $validPassword) {
        session_regenerate_id(true);

        $_SESSION["username"] = $username;
        $_SESSION["login_time"] = date("Y-m-d H:i:s");

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="card">
        <h1>Login</h1>

        <?php if ($error): ?>
            <div class="error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <p class="hint">
            Demo Username: <strong>admin</strong><br>
            Demo Password: <strong>12345</strong>
        </p>
    </div>
</div>

</body>
</html>