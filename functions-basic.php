<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="layout.css">
    </head>
    <body>
        <div class="layout-exercise">
            <h1>Functions: basic</h1>
            <h2>Part 1</h2>
            <ul>
                <li>Create a function <code>calculateSum</code> that has 2 parameters, <code>$number1</code> and <code>$number2</code>
                    <ul>
                        <li>Make sure that in this function the sum of the two numbers is calculated.</li>
                        <li>This function returns the result</li>
                    </ul>
                </li>
                <li>Create a function <code>multiply</code> that has 2 parameters, <code>$number1</code> and <code>$number2</code>
                    <ul>
                        <li>Make sure that in this function the product is calculated.</li>
                        <li>This function returns the result</li>
                    </ul>
                </li>
                <li>Create a function <code>isEven</code> with 1 parameter <code>$number</code>
                    <ul>
                        <li>Make sure that in this function a boolean is returned that, depending on the given number, is <code>true</code> or <code>false</code>.</li>
                    </ul>
                </li>
                <li>Execute all these functions and make sure that the results appear on the screen</li>
                <li class="extension">Create a function that returns the length AND the uppercase version of a string. Then print the length and the uppercase version of the string outside the function.</li>
            </ul>
            <h1 class="extra">Part 2</h1>
            <ul>
                <li>Create a function <code>printArray</code> that has 1 parameter, <code>$array</code></li>
            </ul>
        </div>
        <div class="layout-solution">
            <?php
                include 'header.php';
                function calculateSum($number1, $number2) {
                    return $number1 + $number2;
                }
                function multiply($number1, $number2) {
                    return $number1 * $number2;
                }
                function isEven($number) {
                    return $number % 2 === 0;
                }
                function stringInfo($string) {
                    return [strlen($string), strtoupper($string)];
                }
                $sum = calculateSum(5, 10);
                $product = multiply(4, 3);
                $evenCheck = isEven(7);
                $stringData = stringInfo("hello world");
                echo "<p>Sum: $sum</p>";
                echo "<p>Product: $product</p>";
                echo "<p>Is 7 even? " . ($evenCheck ? 'Yes' : 'No') . "</p>";
                echo "<p>String length: {$stringData[0]}, Uppercase: {$stringData[1]}</p>";
            ?>
            <?php
                function printArray($array) {
                    foreach ($array as $key => $value) {
                        echo "<p>heroes[ $key ] has value '$value'</p>";
                    }
                }
                $heroes = ["Roger Penrose", "Alan Turing", "Grace Hopper"];
                printArray($heroes);
                function validateHtmlTag($html) {
                    return preg_match('/<html>.*<\/html>/s', $html) === 1;
                }
                $validHtml = "<html><body>Hello</body></html>";
                $invalidHtml = "<body>Hello</body>";
                echo "<p>Valid HTML: " . (validateHtmlTag($validHtml) ? 'Yes' : 'No') . "</p>";
                echo "<p>Valid HTML: " . (validateHtmlTag($invalidHtml) ? 'Yes' : 'No') . "</p>";
            ?>
        </div>
    </body>
</html>
