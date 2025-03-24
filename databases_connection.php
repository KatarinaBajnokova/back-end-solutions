<?php
include 'header.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

$dbPath = __DIR__ . '/Chinook_Sqlite.sqlite';

if (!file_exists($dbPath)) {
    die("Database file not found at: " . $dbPath);
}

try {
    $db = new PDO("sqlite:" . $dbPath);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$artistQuery = "SELECT Name FROM Artist ORDER BY Name ASC;";
$stmt = $db->query($artistQuery);
$artists = $stmt->fetchAll(PDO::FETCH_ASSOC);

$columnQuery = "PRAGMA table_info(Customer);";
$stmt = $db->query($columnQuery);
$customerColumns = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $db->query("SELECT name FROM sqlite_master WHERE type='table'");
$tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

$tableResult = null;
if (isset($_GET['table']) && !empty($_GET['table'])) {
    $requestedTable = $_GET['table'];

    $validTables = [];
    foreach ($tables as $table) {
        $validTables[] = $table['name'];
    }

    if (in_array($requestedTable, $validTables)) {
        $stmt = $db->query("PRAGMA table_info(" . $requestedTable . ")");
        $tableResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $tableResult = false;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connection</title>
</head>
<body>
    <h2>Artists (A-Z)</h2>
    <ul>
        <?php foreach ($artists as $artist): ?>
            <li><?php echo htmlspecialchars($artist['Name']); ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Customer Table Columns</h2>
    <ul>
        <?php foreach ($customerColumns as $column): ?>
            <li><?php echo htmlspecialchars($column['name']); ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>List the Columns of a Specific Table</h2>
    <form method="GET" action="">
        <label for="table">Select a table:</label>
        <select name="table" id="table">
            <option value="">--Select a table--</option>
            <?php foreach ($tables as $table): ?>
                <option value="<?php echo htmlspecialchars($table['name']); ?>" <?php if (isset($_GET['table']) && $_GET['table'] === $table['name']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($table['name']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Search">
    </form>

    <?php if (isset($_GET['table'])): ?>
        <?php if ($tableResult === false): ?>
            <p>No results. Table not found.</p>
        <?php elseif ($tableResult && count($tableResult) > 0): ?>
            <h3>Columns in table '<?php echo htmlspecialchars($_GET['table']); ?>':</h3>
            <ul>
                <?php foreach ($tableResult as $col): ?>
                    <li><?php echo htmlspecialchars($col['name']); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No results.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
