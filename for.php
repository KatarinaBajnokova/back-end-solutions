<?php
    include 'header.php';
    function generateNumbersFor() {
        $output = "";
        for ($i = 0; $i <= 100; $i++) {
            $output .= $i . ($i < 100 ? ", " : "");
        }
        return $output;
    }
    function generateDivisibleNumbersFor() {
        $output = "";
        for ($j = 41; $j < 80; $j++) {
            if ($j % 3 === 0) {
                $output .= $j . " ";
            }
        }
        return $output;
    }
    function generateMultiplicationTableFor() {
        $table = "<table>";
        for ($row = 0; $row <= 10; $row++) {
            $table .= "<tr>";
            for ($col = 1; $col <= 10; $col++) {
                $value = $row * $col;
                $class = ($value % 2 === 0) ? 'even' : '';
                $table .= "<td class='$class'>$value</td>";
            }
            $table .= "</tr>";
        }
        $table .= "</table>";
        return $table;
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="layout.css">
    <link rel="stylesheet" href="for.css">
</head>
<body>
    <div class="layout-exercise">
        <h1>Looping statements: for</h1>
        <h2>Part 1</h2>
        <ul>
            <li>Recreate the first part of the <i>looping statements: while</i> exercise using the for loop:
                <ul>
                    <li>Print all numbers from 0 to 100 separated by a comma and a space <code>', '</code>.</li>
                    <li>On the next line, print all numbers that are divisible by 3 AND greater than 40 BUT smaller than 80.</li>
                </ul>
            </li>
        </ul>
        <h1>Part 2</h1>
        <ul>
            <li>Create an HTML document with a PHP code block</li>
            <li>Recreate the first part of the <i>looping statements: while</i> exercise using the for loop:
                <ul>
                    <li>Create an HTML document with a PHP code block</li>
                    <li>Create a table containing the multiplication tables from 1 to 10 next to each other.
                        <div class="facade-minimal" data-url="http://www.app.local/index.php">
                            <table>
                                <tr>
                                    <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
                                </tr>
                                <tr>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                </tr>
                                <tr>
                                    <td>2</td><td>4</td><td>6</td><td>8</td><td>10</td><td>12</td><td>14</td><td>16</td><td>18</td><td>20</td>
                                </tr>
                                <tr>
                                    <td>3</td><td>6</td><td>9</td><td>12</td><td>15</td><td>18</td><td>21</td><td>24</td><td>27</td><td>30</td>
                                </tr>
                            </table>
                        </div>
                    </li>
                    <li>Now make sure that the cells with even numbers get a green background, use a CSS class for this and no inline styles.</li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="layout-solution">
        <h1>Solution</h1>
        <h2>Part 1</h2>
        <p><?php echo generateNumbersFor(); ?></p>
        <p><?php echo generateDivisibleNumbersFor(); ?></p>
        <h2>Part 2</h2>
        <h3>Multiplication Tables</h3>
        <?php echo generateMultiplicationTableFor(); ?>
    </div>
</body>
</html>