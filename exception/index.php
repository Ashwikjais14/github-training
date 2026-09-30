<?php

require_once "CustomException.php";

$message = "";
$messageType = "";

function validateUser($name, $email, $age)
{
    if (empty($name)) {
        throw new ValidationException("Name cannot be empty.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new ValidationException("Please enter a valid email address.");
    }

    if (!is_numeric($age)) {
        throw new ValidationException("Age must be a number.");
    }

    if ($age < 18) {
        throw new ValidationException(
            "User must be at least 18 years old."
        );
    }

    return true;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $age = trim($_POST["age"] ?? "");

    try {

        // Validate user data
        validateUser($name, $email, $age);

        $message = "Registration successful!";
        $messageType = "success";

    } catch (ValidationException $e) {

        // Handle custom exception
        $message = $e->errorMessage();
        $messageType = "error";

    } catch (Exception $e) {

        // Handle any other exception
        $message = "An unexpected error occurred.";
        $messageType = "error";

    } finally {

        // This block always executes
        $logMessage =
            date("Y-m-d H:i:s")
            . " - Registration attempt\n";

        file_put_contents(
            "activity.log",
            $logMessage,
            FILE_APPEND
        );
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>PHP Exception Handling</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Exception Handling</h1>

        <p class="subtitle">
            PHP try, catch, finally, throw and custom exception
        </p>

        <?php if ($message): ?>

            <div class="<?= $messageType ?>">
                <?= htmlspecialchars($message) ?>
            </div>

        <?php endif; ?>

        <form method="POST">

            <label for="name">
                Name
            </label>

            <input
                type="text"
                id="name"
                name="name"
                value="<?= htmlspecialchars($_POST["name"] ?? "") ?>"
            >

            <label for="email">
                Email
            </label>

            <input
                type="text"
                id="email"
                name="email"
                value="<?= htmlspecialchars($_POST["email"] ?? "") ?>"
            >

            <label for="age">
                Age
            </label>

            <input
                type="text"
                id="age"
                name="age"
                value="<?= htmlspecialchars($_POST["age"] ?? "") ?>"
            >

            <button type="submit">
                Register
            </button>

        </form>

        <div class="examples">

            <h3>Try These Tests</h3>

            <ul>
                <li>Leave the name empty.</li>
                <li>Enter an invalid email.</li>
                <li>Enter age below 18.</li>
                <li>Enter a valid name, email and age.</li>
            </ul>

        </div>

    </div>

</div>

</body>
</html>