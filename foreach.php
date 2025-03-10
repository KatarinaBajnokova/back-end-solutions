<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="layout.css">
</head>
<body>
    <div class="layout-exercise">
        <h1>Looping statements: foreach</h1>
        <h2>Part 1</h2>
        <ul>
            <li>Create an HTML document with a PHP code block</li>
            <li>Read the text (text-file.txt) and store the text in a variable <code>$text</code></li>
            <li>Split the text per character and store it in an array <code>$textChars</code></li>
            <li>Sort this array from Z to A</li>
            <li>Reverse the order of the array completely</li>
            <li>Loop through all the characters of the text via a <code>foreach</code> loop and track occurrences.</li>
        </ul>
        <h1 class="extra">Part 2</h1>
        <ul>
            <li>Create an HTML document with a PHP code block</li>
            <li>Create a variable <code>$tekst</code> with value (full content of text-file.txt)</li>
            <li>Analyse how often each letter of the alphabet occurs in the text (only the letters from the alphabet, no distinction between uppercase and lowercase letters)</li>
            <li>Show the results on the screen</li>
        </ul>
    </div>
    <div class="layout-solution">
        <h1>Solution</h1>
        <h2>Part 1</h2>
        <?php
            include 'header.php';
            $filename = "text-file.txt";
            if (!file_exists($filename)) {
                die("File not found!");
            }
            $text = file_get_contents($filename);
            $textChars = str_split($text);
            rsort($textChars);
            $textChars = array_reverse($textChars);
            $charCounts = [];
            foreach ($textChars as $char) {
                if (isset($charCounts[$char])) {
                    $charCounts[$char]++;
                } else {
                    $charCounts[$char] = 1;
                }
            }
            echo "<p>Total unique characters: " . count($charCounts) . "</p>";
            echo "<h2>Character Counts</h2>";
            echo "<ul>";
            foreach ($charCounts as $char => $count) {
                echo "<li> '$char' x $count</li>";
            }
            echo "</ul>";
        ?>
        <h2>Part 2</h2>
        <?php
            $textLower = strtolower($text);
            $alphabetCounts = array_fill_keys(range('a', 'z'), 0);
            foreach (str_split($textLower) as $char) {
                if (isset($alphabetCounts[$char])) {
                    $alphabetCounts[$char]++;
                }
            }
            echo "<h2>Letter Frequency</h2>";
            echo "<ul>";
            foreach ($alphabetCounts as $letter => $count) {
                if ($count > 0) {
                    echo "<li>$letter x $count</li>";
                }
            }
            echo "</ul>";
        ?>
    </div>
</body>
</html>
