<?php
 	include 'header.php';
    $number = 3; 
    $days = ["", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
    $day = $days[$number] ?? "Invalid number"; 

  
    $dayUpper = strtoupper($day); 
    $dayCustom = str_replace('A', 'a', $dayUpper); 

 
    $lastAPos = strrpos($dayUpper, 'A');
    $dayLastACustom = ($lastAPos !== false) ? substr_replace($dayUpper, 'a', $lastAPos, 1) : $dayUpper;
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
        <h1>Conditional statements: if</h1> 

        <h2>Part 1</h2>

        <ul>
            <li>Create an HTML document with a PHP code block</li>
            <li>Create a PHP script that, based on a number (between 1 and 7), prints the corresponding day in lowercase letters (no capital letters!)</li>
            <li>For example, when <code>$number</code> is equal to 1, the string <code>monday</code> is displayed on the screen</li>
        </ul>

        <h2 class="extra">Part 2</h2>

        <ul>
            <li>Make a copy of part 1</li>
            <li>Convert the name of the day (e.g. <code>monday</code>) to uppercase letters (e.g. <code>MONDAY</code>) using a string function.</li>
            <li>Create a variable that contains the name of the day completely in uppercase, except for the 'a' and print this variable in the HTML</li>
            <li>Create a variable that contains the name of the day completely in uppercase, except for the last 'a'</li>
        </ul>
        </div>

        <div class="layout-solution">
        <h1>Solution</h1> 
        
        <h2>Part 1</h2>

        <p>Number: <strong><?= $number; ?></strong></p>
        
        <p>Day in lowercase: <strong><?= $day; ?></strong></p>

        <h2 class="extra">Part 2</h2>
        
        <p>Day in uppercase: <strong><?= $dayUpper; ?></strong></p>
        
        <p>Day in uppercase (except 'a' lowercase): <strong><?= $dayCustom; ?></strong></p>
        
        <p>Day in uppercase (except last 'a' lowercase): <strong><?= $dayLastACustom; ?></strong></p>
        
        </div>
 
    </body>
</html>