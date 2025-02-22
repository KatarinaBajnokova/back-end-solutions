<?php
    // Part 1
    $textToCheck = "ExampleText";
    $check1 = strlen($textToCheck) > 5 && ctype_upper($textToCheck[0]);
    $check2 = strlen($textToCheck) > 5 || strpos($textToCheck, 'e') !== false;
    $check3 = strlen($textToCheck) > 5;
    $check3b = !(strlen($textToCheck) <= 5); // Alternative method

    // Part 2
    $yearOfBirth = 2000;
    $monthOfBirth = 12;
    $applyCondition = ($yearOfBirth % 2 !== 0 || $yearOfBirth > 1994) || ($monthOfBirth <= 6);
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/css/global.css">
        <link rel="stylesheet" type="text/css" href="/css/directory.css">
        <link rel="stylesheet" type="text/css" href="/css/facade.css">

        <style>
        .applicable {
            background-color: green;
            color: white;
            padding: 10px;
            font-weight: bold;
        }
    </style>
    </head>
    <body >
		<h1>Logic operators</h1>

        <h2>Part 1</h2>

		<ul>
            <li>Create a variable called <code>$textToCheck</code></li>
            <li>Assign any string you want to it</li>
            <li>Create a variable called <code>$check1</code> that evaluates whether <code>$textToCheck</code> has more than 5 characters and starts with a capital</li>
            <li>Create a variable called <code>$check2</code> that evaluates whether <code>$textToCheck</code> has more than 5 characters or contains the letter 'e'</li>
            <li>Create a variable called <code>$check3</code> that evaluates to <code>true</code> when <code>$textToCheck</code> has more than 5 characters</li>
            <li>Do the exact evaluation as above, in <code>$check3b</code>. Only now, write it differently.</li>
            <li>Show the results of all the check variables in a valid HTML document. Make sure you can see the value (true of false) written in letters in stead of showing numbers (0,1)</li>
		</ul>

        <h2>Part 2</h2>

        <ul>
            <li>Create a valid HTML document</li>
            <li>Create a variable called <code>$yearOfBirth</code> that contains the year of your birth in <code>dddd</code> (ie. 1994) format</li>
            <li>Create a variable called <code>$monthOfBirt</code> that contains the year of your birth in <code>mm</code> (ie. 02) format</li>
            <li>Evaluate if your year of birth is odd or above 1994. If this is not the case and your month of birth is below or equal to the first six months, then it should still evaluate to true.</li>
            <li>If the above evaluation is true, then the text "You apply" is being shown in a <code>&lt;p&gt;</code> element and a class is being added called "applicable". This class makes the background-color of the paragraph green and the text white.</li>
        </ul>


        <h1>Logic Operators</h1>

    <h2>Part 1</h2>
    <ul>
        <li><code>$textToCheck</code>: <strong><?= $textToCheck; ?></strong></li>
        <li>Check 1 (More than 5 chars AND starts with a capital): <strong><?= $check1 ? 'True' : 'False'; ?></strong></li>
        <li>Check 2 (More than 5 chars OR contains 'e'): <strong><?= $check2 ? 'True' : 'False'; ?></strong></li>
        <li>Check 3 (More than 5 chars - Method 1): <strong><?= $check3 ? 'True' : 'False'; ?></strong></li>
        <li>Check 3b (More than 5 chars - Alternative Method): <strong><?= $check3b ? 'True' : 'False'; ?></strong></li>
    </ul>

    <h2>Part 2</h2>
    <ul>
        <li>Year of Birth: <strong><?= $yearOfBirth; ?></strong></li>
        <li>Month of Birth: <strong><?= $monthOfBirth; ?></strong></li>
        <li>Condition Met: <strong><?= $applyCondition ? 'True' : 'False'; ?></strong></li>
    </ul>

    <?php if ($applyCondition): ?>
        <p class="applicable">You apply</p>
    <?php endif; ?>

    <a href="concatenation.php">Concatenation Exercise</a>
	<br>
    <a href="functions.php">Functions Exercise</a>
    </body>
</html>