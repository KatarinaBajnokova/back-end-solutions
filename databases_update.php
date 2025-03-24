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
        password VARCHAR(255)
    )");
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}

$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = (int) $_POST['id'];
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $stmt = $db->prepare("UPDATE users SET username = :username, password = :password WHERE id = :id");
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()) {
        $successMessage = "User updated successfully.";
    } else {
        $successMessage = "An error occurred while updating.";
    }
}

$stmt = $db->query("SELECT * FROM users ORDER BY id ASC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Databases: update</title>
        <style>
            table { width: 100%; border-collapse: collapse; }
            th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
            .modal.success { color: green; margin-bottom: 10px; }
        </style>
    </head>
    <body>
        <h1>Databases: update</h1>
        <?php if ($successMessage): ?>
            <div class="modal success"><?php echo $successMessage; ?></div>
        <?php endif; ?>
        <h2>Part 2: updating users</h2>
            <h1>Dashboard</h1>
            <h2>user overview</h2>
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>username</th>
                        <th>password</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($users): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <form action="databases_update.php" method="post">
                                    <td><?php echo $user['id']; ?><input type="hidden" name="id" value="<?php echo $user['id']; ?>"></td>
                                    <td><input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>"></td>
                                    <td><input type="text" name="password" value="<?php echo htmlspecialchars($user['password']); ?>"></td>
                                    <td><input type="submit" name="update" value="update"></td>
                                </form>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="4">No users found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <ul>
            <li>When changing some data and clicking on <i>update</i>, the data is updated for that user</li>
        </ul>
    </body>
</html>
