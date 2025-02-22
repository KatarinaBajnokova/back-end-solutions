<?php
	include 'header.php';
    $number = rand(1, 100); 

   
    $lowerBound = intdiv($number, 10) * 10;
    $upperBound = $lowerBound + 10;

   
    $message = sprintf("The number %d lies between %d and %d.", $number, $lowerBound, $upperBound);
    $reversedMessage = strrev($message); 
?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="layout.css">
    </head>
    <body >
        <div class="layout-exercise">
        <h1>Conditional statements: if else if</h1>
        
        <h2>Part 1</h2>

        <ul>
            <li>Create a number with a value between 1-100</li>
            <li>Make sure the script can say between which tens the number lies, for example 'The number lies between 20 and 30'.</li>
            <li>Then make sure the message is printed in reverse, for example '03 dna 02 neewteb seil rebmun ehT'.</li>
        </ul>
</div>

<div class="layout-solution">
        <h1>Solution</h1>

        <h2>Part 1</h2>

        <p>Original message: <strong><?= $message; ?></strong></p>
        <p>Reversed message: <strong><?= $reversedMessage; ?></strong></p>
</div>

    </body>
</html>