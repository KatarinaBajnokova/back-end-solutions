<?php
	include 'header.php';
    $dayNumber = rand(1, 7); 
    switch ($dayNumber) {
        case 1: $day = "monday"; break;
        case 2: $day = "tuesday"; break;
        case 3: $day = "wednesday"; break;
        case 4: $day = "thursday"; break;
        case 5: $day = "friday"; break;
        case 6: $day = "saturday"; break;
        case 7: $day = "sunday"; break;
        default: $day = "invalid day"; 
    }

    $month = "January"; 
    $month = strtolower($month); 

    switch ($month) {
        case "december": case "january": case "february":
            $season = "winter";
            break;
        case "march": case "april": case "may":
            $season = "spring";
            break;
        case "june": case "july": case "august":
            $season = "summer";
            break;
        case "september": case "october": case "november":
            $season = "autumn";
            break;
        default:
            $season = "This is not a month that I recognize.";
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="layout.css">
    </head>
    <body>

        <div class="layout-exercise">
        <h1>Conditional statements: switch</h1> 

        <h2>Part 1</h2>

        <ul>
            <li>Create an HTML document with a PHP code block</li>
            <li>Create a PHP script that, based on a number (between 1 and 7), prints the corresponding day in lowercase letters (no capital letters!)</li>
            <li>Use a switch</li>
        </ul>

        <h2 class="extra">Part 2</h2>

        <ul>
            <li>Create an HTML document with a PHP code block</li>
            <li>Create a PHP script that evaluates a variable <code>month</code> and prints out which season that month is part of.</li>
            <li>Use a switch</li>
            <li>The default should mention something like: "This is not a month that I recognize"</li>
            <li>Suppose the <code>month</code> value comes from user input. Sometimes the user writes the month with a capital, sometimes without. Can you come up with a solution so that both the capitalized version of the month and the non capitalized version can be evaluated?</li>
        </ul>
</div>

    <div class="layout-solution">
        <h1>Solution</h1> 

        <h2>Part 1: Days of the Week</h2>
        <p>Number: <strong><?= $dayNumber; ?></strong></p>
        <p>Day: <strong><?= $day; ?></strong></p>

        <h2 class="extra">Part 2: Seasons</h2>
        <p>Month: <strong><?= ucfirst($month); ?></strong></p>
        <p>Season: <strong><?= $season; ?></strong></p>
    </div>
    </body>
</html>