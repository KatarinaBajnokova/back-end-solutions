<?php
include 'header.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

try {
    $db = new PDO('sqlite:back-end-users-exercise.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username VARCHAR(255) UNIQUE,
        password VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}

$username = "";
$password = "";
$confirmPassword = "";
$usernameError = "";
$passwordError = "";
$confirmPasswordError = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirmPassword = trim($_POST['confirm_password'] ?? '');
    
    if (empty($username)) {
        $usernameError = "Username cannot be empty.";
    } else {
        $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        if ($stmt->fetchColumn() > 0) {
            $usernameError = "Username is already taken.";
        }
    }
    
    if (empty($password)) {
        $passwordError = "Password cannot be empty.";
    } elseif (strlen($password) < 8) {
        $passwordError = "Password must be at least 8 characters long.";
    } elseif (!preg_match('/[!?\@_]/', $password)) {
        $passwordError = "Password must contain at least one special character: !, ?, @, _.";
    }
    
    if ($password !== $confirmPassword) {
        $confirmPasswordError = "Passwords do not match.";
    }
    
    if (empty($usernameError) && empty($passwordError) && empty($confirmPasswordError)) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $passwordHash);
        
        if ($stmt->execute()) {
            $successMessage = "User registered successfully!";
            $username = "";
        } else {
            $successMessage = "An error occurred during registration.";
        }
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add</title>
    <style>
        .modal.error { color: red; margin-top: 5px; }
        .modal.success { color: green; margin-top: 5px; }
    </style>
</head>
<body>
    <h1>Register</h1>
    <?php if ($successMessage): ?>
        <div class="modal success"><?php echo $successMessage; ?></div>
    <?php endif; ?>
    <form action="databases_add.php" method="post">
        <ul>
            <li>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username); ?>">
                <?php if ($usernameError): ?>
                    <div class="modal error"><?php echo $usernameError; ?></div>
                <?php endif; ?>
            </li>
            <li>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
                <?php if ($passwordError): ?>
                    <div class="modal error"><?php echo $passwordError; ?></div>
                <?php endif; ?>
            </li>
            <li>
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" id="confirm_password">
                <?php if ($confirmPasswordError): ?>
                    <div class="modal error"><?php echo $confirmPasswordError; ?></div>
                <?php endif; ?>
            </li>
        </ul>
        <input type="submit" value="Register">
    </form>
</body>
</html>
