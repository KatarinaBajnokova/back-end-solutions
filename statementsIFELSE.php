<?php
	include 'header.php';
    function isLeapYear($year) {
        return ($year % 4 === 0 && $year % 100 !== 0) || ($year % 400 === 0);
    }

    $year = 2024; 
    $leapYearMessage = isLeapYear($year) ? "$year is a leap year." : "$year is not a leap year.";

  
    $totalSeconds = 221108521; 
    $secondsLeft = $totalSeconds;

    $minutes = intdiv($secondsLeft, 60);
    $secondsLeft %= 60;

    $hours = intdiv($minutes, 60);
    $minutes %= 60;

    $days = intdiv($hours, 24);
    $hours %= 24;

    $weeks = intdiv($days, 7);
    $days %= 7;

    $months = intdiv($days + ($weeks * 7), 31); 

    $years = intdiv($days + ($weeks * 7), 365); 
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
        <h1>Conditional statements: if else</h1>

        <h2>Part 1</h2>

        <ul>
            <li>Create a PHP script that can determine whether the variable 'year' is a leap year or not
                <ul>
                    <li>A year is a leap year if it is divisible by 4</li>
                    <li>A year divisible by 100 is not a leap year</li>
                    <li>A year divisible by 400 is a leap year</li>
                </ul>
            </li>
        </ul>

        <h1 class="extra">Part 2</h1>

        <ul>
            <li>Create a PHP script that finds out how many full years, months, weeks, days, hours, minutes, and seconds there are in a given number of seconds (e.g., 221108521)</li>

            <li>
                Assume that a month has 31 days and a year has 365 days. The result should look something like this:

                <div class="facade-minimal" data-url="http://www.app.local/index.php">

                    <h1>Years, months, weeks, days, hours, minutes, and seconds</h1>

                    <p>in 221108521 seconds</p>

                    <ul>
                        <li>minutes: 3685142</li>
                        <li>hours: 61419</li>
                        <li>days: 2559</li>
                        <li>weeks: 365</li>
                        <li>months (31): 82</li>
                        <li>years (365): 7</li>
                    </ul>
                </div>

            </li>
        </ul>
</div>

        <div class="layout-solution">
        <h1>Solution</h1>
        <h2>Part 1: Leap Year Check</h2>
        
        <p><?= $leapYearMessage; ?></p>

        <h1 class="extra">Part 2: Time Conversion</h1>

        <div class="facade-minimal">
        <h2>Years, months, weeks, days, hours, minutes, and seconds</h2>
        <p>in <?= number_format($totalSeconds); ?> seconds:</p>
    <ul>
        <li>Minutes: <strong><?= number_format($minutes); ?></strong></li>
        <li>Hours: <strong><?= number_format($hours); ?></strong></li>
        <li>Days: <strong><?= number_format($days); ?></strong></li>
        <li>Weeks: <strong><?= number_format($weeks); ?></strong></li>
        <li>Months (31 days): <strong><?= number_format($months); ?></strong></li>
        <li>Years (365 days): <strong><?= number_format($years); ?></strong></li>
    </ul>
</div>
</div>

    </body>
</html>