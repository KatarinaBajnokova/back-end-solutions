<?php
	include 'header.php';
    $firstName = "Katarina";  
    $lastName = "Bajnokova";  
    $fullName = $firstName . " " . $lastName; 
    $charCount = strlen($fullName);
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
		<h1>Exercise string concatenation</h1>
		<ul>
            <li>Create two separate variables that contain your first name and last name</li>
            <li>Concatenate both variables en assign the concatenated value to a new variable called <code>$fullName</code></li>
            <li>Print the variable value in a valid HTML document</li>
            <li>Extra: print the character count of <code>$fullName</code> in a new paragraph</li>
		</ul>
        </div>

    <div class="layout-solution">
    <h1>Solution</h1>
    <p>Full Name: <strong><?php echo $fullName; ?></strong></p>
    <p>Character Count: <?php echo $charCount; ?> characters</p>
    </div>
    </body>
</html>
