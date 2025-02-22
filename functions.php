<?php
    $fruit = "coconut"; 
    $fruitLength = strlen($fruit); 
    $firstO = strpos($fruit, "o"); 

    $fruit2 = "pineaple"; 
    $lastA = strrpos($fruit2, "a"); 
    $fruit2Upper = strtoupper($fruit2); 

    $letter = "e"; 
    $number = "3";
    $longestWord = "pneumonoultramicroscopicsilicovolcanoconiosis"; 
    $modifiedWord = str_replace($letter, $number, $longestWord); 


?>



<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/css/global.css">
        <link rel="stylesheet" type="text/css" href="/css/directory.css">
        <link rel="stylesheet" type="text/css" href="/css/facade.css">
    </head>
    <body>
        
        <h1>String functions</h1>

        <h2>Part 1</h2>

        <ul>
            <li>Create a variable <code>$fruit</code> with the value <code>coconut</code></li>
            <li>Count how many characters the variable fruit has, using a PHP string function</li>
            <li>Print this variable</li>
            <li>Determine the position of the first 'o' in the variable <code>$fruit</code>. Print this value.</li>
        </ul>

        <h2>Part 2</h2>

        <ul>
            <li>Create a variable <code>fruit</code> with the value <code>pineable</code></li>
            <li>Determine the position of the last 'a' in the variable <code>$fruit</code></li>
            <li>Print this value.</li>
            <li>Convert the value of the <code>$fruit</code> variable to uppercase using a PHP string function.</li>
        </ul>

        <h2>Part 3</h2>

        <ul>
            <li>Create a variable <code>$letter</code> with <code>e</code> as the value.</li>
            <li>Create a variable <code>$number</code> with <code>3</code> as the value.</li>
            <li>Create a variable <code>$longestWord</code> with <code>pneumonoultramicroscopicsilicovolcanoconiosis</code> as the value.</li>
            <li>Now replace all the e's in the <code>$longestWord</code> variable with 3's.
                <p class="remark">You can only use the variable names. The values <code>e</code>, <code>3</code> and <code>pneumonoultramicroscopicsilicovolcanoconiosis</code> can only appear once in the PHP document.</p>
            </li>
        </ul>

        <h1>String Functions</h1>

    <h2>Part 1</h2>
    <ul>
        <li> <?php echo $fruit; ?> </li>
        <li>Character count: <?php echo $fruitLength; ?> </li>
        <li>First occurrence of 'o': <?php echo $firstO; ?> </li>
    </ul>

    <h2>Part 2</h2>
    <ul>
        <li> <?php echo $fruit2; ?> </li>
        <li>Last occurrence of 'a': <?php echo $lastA; ?> </li>
        <li>Uppercase version: <?php echo $fruit2Upper; ?> </li>
    </ul>

    <h2>Part 3</h2>
    <ul>
        <li>Original word: <?php echo $longestWord; ?> </li>
        <li>Modified word: <?php echo $modifiedWord; ?></li>
    </ul>


        <a href="concatenation.php">Concatenation Exercise</a>
        <br>
        <a href="index.php">Debug-Errors Exercise</a>
    </body>
</html>