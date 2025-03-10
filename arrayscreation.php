<?php
    include 'header.php';
    
    $animals1 = array("Dog", "Cat", "Elephant", "Tiger", "Lion", "Horse", "Rabbit", "Kangaroo", "Panda", "Dolphin");
    $animals2 = ["Wolf", "Fox", "Bear", "Giraffe", "Zebra", "Monkey", "Parrot", "Crocodile", "Eagle", "Penguin"];
    
    $vehicles = [
        "landVehicles" => ["Vespa", "Bicycle"],
        "waterVehicles" => ["Surfboard", "Raft", "Schooner", "Three-master"],
        "airVehicles" => ["Hot air balloon", "Helicopter", "B52"]
    ];
    
    $numbers = [1, 2, 3, 4, 5];
    
    $product = array_product($numbers);
    
    $oddNumbers = array_filter($numbers, fn($num) => $num % 2 !== 0);
    
    $numbers2 = [5, 4, 3, 2, 1];
    
    $sumArray = array_map(fn($a, $b) => $a + $b, $numbers, $numbers2);
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
        <h1>Arrays: creation</h1>
        <ul>
            <li>Create an array in which you store 10 animals (do this in 2 different ways)</li>
            <li>Create a new array containing 5 vehicles, making sure you can determine which category of vehicle it is (2-dimensional array).</li>
        </ul>
        <h1 class="extra">Exercise arrays: part 2</h1>
        <ul>
            <li>Create an array in which you place the numbers 1, 2, 3, 4, 5</li>
            <li>Multiply all the numbers together and print to the screen</li>
            <li>Print the odd numbers (by using an operator, do not do this manually)</li>
            <li>Create a second array in which you place the numbers 5, 4, 3, 2, 1</li>
            <li>Add the numbers from both arrays with the same index together</li>
        </ul>
    </div>
    <div class="layout-solution">
        <h1>Solution</h1>
        <h2>Part 1</h2>
        <pre><?php print_r($vehicles); ?></pre>
        <h2>Part 2</h2>
        <ul>
            <li>Product of all numbers: <strong><?php echo $product; ?></strong></li>
            <li>Odd numbers: <code><?php echo implode(", ", $oddNumbers); ?></code></li>
            <li>Summed arrays: <code><?php echo implode(", ", $sumArray); ?></code></li>
        </ul>
    </div>
</body>
</html>
