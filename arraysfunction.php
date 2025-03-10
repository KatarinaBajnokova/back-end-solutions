<?php
    include 'header.php';
    
    $animals = ["Dog", "Cat", "Elephant", "Tiger", "Lion", "Horse", "Rabbit", "Giraffe"];
    $animalCount = count($animals);
    $teZoekenDier = "Tiger";
    $foundMessage = in_array($teZoekenDier, $animals) ? "$teZoekenDier was found in the array!" : "$teZoekenDier was not found in the array.";
    
    $sortedAnimals = $animals;
    sort($sortedAnimals);
    
    $mammals = ["Dolphin", "Bear", "Kangaroo"];
    $mergedAnimals = array_merge($sortedAnimals, $mammals);
    
    $numbers = [8, 7, 8, 7, 3, 2, 1, 2, 4];
    $uniqueNumbers = array_unique($numbers);
    rsort($uniqueNumbers);
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
        <h1>Arrays: Functions</h1>
        <h2>Exercise - Part 1</h2>
        <ul>
            <li>Create an array in which you place more than 5 animals</li>
            <li>Let the script calculate how many elements are in the array and print to the screen</li>
            <li>Make it possible to search for an animal in the array with a variable <code>$teZoekenDier</code>, also print a suitable message (found/not found).</li>
        </ul>
    </div>
    <div class="layout-solution">
        <h2>Solution - Part 1</h2>
        <ul>
            <li>Number of animals in the array: <strong><?php echo $animalCount; ?></strong></li>
            <li>Search result: <strong><?php echo $foundMessage; ?></strong></li>
        </ul>
    </div>
    <div class="layout-exercise">
        <h2>Exercise - Part 2</h2>
        <ul>
            <li>Sort the array alphabetically (A -> Z)</li>
            <li>Create an array <code>$mammals</code> and place 3 animals in it, then merge the 2 arrays with animals into the array <code>$animals</code></li>
        </ul>
    </div>
    <div class="layout-solution">
        <h2>Solution - Part 2</h2>
        <ul>
            <li>Sorted animals: <strong><?php echo implode(", ", $sortedAnimals); ?></strong></li>
            <li>Merged animals list: <strong><?php echo implode(", ", $mergedAnimals); ?></strong></li>
        </ul>
    </div>
    <div class="layout-exercise">
        <h3>Exercise - Part 3</h3>
        <ul>
            <li>Create an array with the following values: <code>8, 7, 8, 7, 3, 2, 1, 2, 4</code></li>
            <li>Remove the duplicates from the array</li>
            <li>Sort the array from largest to smallest</li>
        </ul>
    </div>
    <div class="layout-solution">
        <h2>Solution - Part 3</h2>
        <ul>
            <li>Unique numbers (duplicates removed): <strong><?php echo implode(", ", $uniqueNumbers); ?></strong></li>
            <li>Sorted numbers (largest to smallest): <strong><?php echo implode(", ", $uniqueNumbers); ?></strong></li>
        </ul>
    </div>
</body>
</html>
