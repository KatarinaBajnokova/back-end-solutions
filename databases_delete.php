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
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        SoftDeleted BOOLEAN DEFAULT 0
    )");
    try {
        $db->exec("ALTER TABLE users ADD COLUMN SoftDeleted BOOLEAN DEFAULT 0");
    } catch (Exception $e) {
        // Column already exists; ignore error.
    }
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}

$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
    $idToDelete = (int) $_POST['id'];
    $stmt = $db->prepare("UPDATE users SET SoftDeleted = 1 WHERE id = :id");
    $stmt->bindValue(':id', $idToDelete, PDO::PARAM_INT);
    if ($stmt->execute()) {
        $successMessage = "User deleted successfully.";
    } else {
        $successMessage = "An error occurred during deletion.";
    }
}

$confirmationUser = null;
if (isset($_GET['delete_id'])) {
    $deleteId = (int) $_GET['delete_id'];
    $stmt = $db->prepare("SELECT * FROM users WHERE id = :id AND SoftDeleted = 0");
    $stmt->bindValue(':id', $deleteId, PDO::PARAM_INT);
    $stmt->execute();
    $confirmationUser = $stmt->fetch(PDO::FETCH_ASSOC);
}

$stmt = $db->query("SELECT * FROM users WHERE SoftDeleted = 0 ORDER BY id ASC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delete</title>
    <style>
        .modal.warning { background-color: #ffdddd; border: 1px solid red; padding: 10px; margin-bottom: 15px; }
        .modal.success { background-color: #ddffdd; border: 1px solid green; padding: 10px; margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Delete</h1>
    <?php if ($successMessage): ?>
        <div class="modal success"><?php echo $successMessage; ?></div>
    <?php endif; ?>
    <?php if ($confirmationUser): ?>
        <div class="modal warning">
            <p>You are about to delete "<b><?php echo htmlspecialchars($confirmationUser['username']); ?></b>" (id: <?php echo $confirmationUser['id']; ?>). Are you sure?</p>
            <form action="databases_delete.php" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $confirmationUser['id']; ?>">
                <input type="submit" name="confirm_delete" value="Delete">
            </form>
            <a href="databases_delete.php"><button type="button">Cancel</button></a>
        </div>
    <?php endif; ?>
    <h2>User Overview</h2>
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
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo htmlspecialchars($user['password']); ?></td>
                        <td>[<a href="databases_delete.php?delete_id=<?php echo $user['id']; ?>" title="delete">x</a>]</td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4">No users found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
