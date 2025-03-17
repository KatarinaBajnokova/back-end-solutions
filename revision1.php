<?php
include 'header.php';

$solutionsDir = './';
$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';
$link = isset($_GET['link']) ? $_GET['link'] : '';

function showList($directory) {
    if (!is_dir($directory)) {
        echo "<p>Error: The directory <strong>$directory</strong> does not exist.</p>";
        return;
    }

    $files = array_filter(scandir($directory), function ($file) use ($directory) {
        return is_file($directory . $file) && pathinfo($file, PATHINFO_EXTENSION) === 'php';
    });

    if (empty($files)) {
        echo "<p>No PHP files found in <strong>$directory</strong>.</p>";
        return;
    }

    echo "<ul class='file-list'>";
    foreach ($files as $file) {
        echo "<li><a href='{$directory}{$file}'>$file</a></li>";
    }
    echo "</ul>";
}

function searchFiles($directory, $searchTerm) {
    $matches = [];
    if (!is_dir($directory)) {
        return [];
    }

    $files = array_filter(scandir($directory), function ($file) use ($directory) {
        return is_file($directory . $file) && pathinfo($file, PATHINFO_EXTENSION) === 'php';
    });

    foreach ($files as $file) {
        $filePath = $directory . $file;
        $content = file_get_contents($filePath);

        if (stripos($file, $searchTerm) !== false || stripos($content, $searchTerm) !== false) {
            $matches[] = "<li><a href='{$filePath}'>$file</a></li>";
        }
    }
    return $matches;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revision 1</title>
    <link rel="stylesheet" href="revision.css">
</head>
<body>
    <h1>Revision 1</h1>

    <ul class="heart-list">
        <li><a href="revision1.php?link=course">Course</a></li>
        <li><a href="revision1.php?link=examples">Examples</a></li>
        <li><a href="revision1.php?link=solutions">Solutions</a></li>
    </ul>

    <form method="GET" action="revision1.php">
        <label for="search">Search for:</label>
        <input type="text" id="search" name="search" placeholder="<?php echo $searchTerm ? htmlspecialchars($searchTerm) : 'Enter a search term'; ?>">
        <button type="submit">Search</button>
    </form>

    <?php if (!$link): ?>
        <h2>Content</h2>
    <?php endif; ?>

    <?php
    switch ($link) {
        case 'course':
            echo "<iframe src='pdf/course.pdf' width='1000' height='750'></iframe>";
            break;
        case 'examples':
            echo "<h2>Examples</h2>";
            showList($solutionsDir);
            break;
        case 'solutions':
            echo "<h2>Solutions</h2>";
            showList($solutionsDir);
            break;
        default:
            echo "<p>Select an option above.</p>";
            break;
    }
    ?>

    <?php if ($searchTerm): ?>
        <h2>Search Results for "<?php echo htmlspecialchars($searchTerm); ?>"</h2>
        <?php
        $results = searchFiles($solutionsDir, $searchTerm);
        if (empty($results)) {
            echo "<p>Sorry, no search results found for \"" . htmlspecialchars($searchTerm) . "\"</p>";
        } else {
            echo "<ul class='file-list'>" . implode('', $results) . "</ul>";
        }
        ?>
    <?php endif; ?>
</body>
</html>
