<?php
session_start();

if (isset($_SESSION["email"])) {
    header("Location: dashboard.php");
    exit();
}

$error = "";

// Get remembered email from cookie
$rememberedEmail = $_COOKIE["remember_email"] ?? "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";
    $remember = isset($_POST["remember"]);

    // Demo credentials
    $validEmail = "admin@example.com";
    $validPassword = "12345";

    if ($email === $validEmail && $password === $validPassword) {

        session_regenerate_id(true);

        $_SESSION["email"] = $email;

        // Remember email for 7 days
        if ($remember) {
            setcookie(
                "remember_email",
                $email,
                time() + (7 * 24 * 60 * 60),
                "/"
            );
        } else {
            // Delete cookie if Remember Me is not selected
            setcookie(
                "remember_email",
                "",
                time() - 3600,
                "/"
            );
        }

        header("Location: dashboard.php");
        exit();

    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Remember Me</title>
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

            <label for="email">Email</label>

            <input
                type="email"
                id="email"
                name="email"
                value="<?= htmlspecialchars($rememberedEmail) ?>"
                required
            >

            <label for="password">Password</label>

            <input
                type="password"
                id="password"
                name="password"
                required
            >

            <div class="remember">
                <input
                    type="checkbox"
                    id="remember"
                    name="remember"
                >

                <label for="remember">Remember Me</label>
            </div>

            <button type="submit">Login</button>

        </form>

        <p class="hint">
            Demo Email: <strong>admin@example.com</strong><br>
            Demo Password: <strong>12345</strong>
        </p>

    </div>
</div>

</body>
</html>