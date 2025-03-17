<?php
include 'header.php';

$correctUsername = 'stijn';
$correctPassword = 'azerty';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputUsername = isset($_POST['username']) ? trim($_POST['username']) : '';
    $inputPassword = isset($_POST['password']) ? trim($_POST['password']) : '';

    $message = ($inputUsername === $correctUsername && $inputPassword === $correctPassword) 
        ? 'Welcome' 
        : 'There was an error logging in, please try again';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <?php if (!empty($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
</body>
</html>
