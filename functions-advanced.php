<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="layout.css">
    </head>
    <body>
        <div class="layout-exercise">
            <h1>Functions: advanced</h1>
            <h2>Part 1</h2>
            <ul>
                <li>Create a global variable <code>$md5HashKey</code> with the value <code>'d1fa402db91a7a93c4f414b8278ce073'</code></li>
                <li>Create three different functions that each address the global variable <code>$md5HashKey</code> in a different way.</li>
                <li>The purpose of these functions is always the same: to count how many percent a certain parameter occurs in <code>$md5HashKey</code>.</li>
                <li>Call each function once, each time with a different argument:
                    <ul>
                        <li>Argument Function 1: <code>'2'</code></li>
                        <li>Argument Function 2: <code>'8'</code></li>
                        <li>Argument Function 3: <code>'a'</code></li>
                    </ul>
                </li>
            </ul>
            <h1 class="extra">Part 2 (Angry Birds)</h1>
            <ul>
                <li>The goal is to create a simplified text version of Angry Birds</li>
            </ul>
        </div>
        <div class="layout-solution">
            <h1>Solutions</h1>
            <?php
                include 'header.php';
                $md5HashKey = 'd1fa402db91a7a93c4f414b8278ce073';
                function countOccurrence1($needle) {
                    global $md5HashKey;
                    $count = substr_count($md5HashKey, $needle);
                    return "Function 1: The needle '$needle' occurs $count times in the hash key '$md5HashKey'";
                }
                function countOccurrence2($needle) {
                    $count = substr_count($GLOBALS['md5HashKey'], $needle);
                    return "Function 2: The needle '$needle' occurs $count times in the hash key '{$GLOBALS['md5HashKey']}'";
                }
                function countOccurrence3($needle) {
                    static $key;
                    $key = isset($key) ? $key : 'd1fa402db91a7a93c4f414b8278ce073';
                    $count = substr_count($key, $needle);
                    return "Function 3: The needle '$needle' occurs $count times in the hash key '$key'";
                }
                echo "<p>" . countOccurrence1('2') . "</p>";
                echo "<p>" . countOccurrence2('8') . "</p>";
                echo "<p>" . countOccurrence3('a') . "</p>";
            ?>
            <?php
                $pigHealth = 5;
                $maximumThrows = 8;
                function calculateHit() {
                    global $pigHealth;
                    $hitChance = rand(1, 100) <= 40;
                    if ($hitChance) {
                        $pigHealth--;
                        return "Hit! " . ($pigHealth === 1 ? "There is only 1 pig left." : "There are only $pigHealth pigs left.");
                    } else {
                        return "Miss! " . ($pigHealth === 1 ? "There is only 1 pig left." : "There are $pigHealth pigs left.");
                    }
                }
                function launchAngryBird() {
                    static $throws = 0;
                    global $pigHealth, $maximumThrows;
                    if ($throws >= $maximumThrows || $pigHealth <= 0) {
                        echo "<p>" . ($pigHealth <= 0 ? "Won!" : "Lost!") . "</p>";
                        return;
                    }
                    $throws++;
                    echo "<p>" . calculateHit() . "</p>";
                    launchAngryBird();
                }
                echo "<h1>Text-based Angry Birds</h1>";
                launchAngryBird();
            ?>
        </div>
    </body>
</html>