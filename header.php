<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Solutions</title>

    <style>
   
        nav {
            background-color: #8b008b; 
            padding: 15px;
            display: flex;
            justify-content: center; 
            align-items: center;
            position: fixed; 
            top: 0;
            left: 0;
            width: 100%;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        nav ul {
            list-style: none; 
            margin: 0;
            padding: 0;
            display: flex;
            gap: 15px; 
        }

        nav ul li {
            display: inline;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 10px 15px;
            transition: background 0.3s ease-in-out;
            border-radius: 5px;
            font-size: 12px;
        }

        nav a:hover {
            background:rgb(202, 14, 202); 
        }

        body {
            padding-top: 60px;
            font-family: Arial, sans-serif;
        }
    </style>

</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Debug Errors</a></li>
            <li><a href="concatenation.php">Concatenation</a></li>
            <li><a href="functions.php">Functions</a></li>
            <li><a href="operators.php">Operators</a></li>
            <li><a href="statementsIF.php">If Statements</a></li>
            <li><a href="statementsIFELSE.php">If-Else</a></li>
            <li><a href="statementsIFELSEIF.php">If-ElseIf</a></li>
            <li><a href="switch.php">Switch</a></li>
            <li><a href="arrayscreation.php">Arrays Creation</a></li>
            <li><a href="arraysfunction.php">Arrays Function</a></li>
            <li><a href="while.php">While</a></li>
            <li><a href="for.php">For</a></li>
            <li><a href="foreach.php">Foreach</a></li>
            <li><a href="functions-basic.php">Functions basic</a></li>
            <li><a href="functions-advanced.php">Functions advanced</a></li>
            <li><a href="get.php">Get</a></li>
            <li><a href="post.php">Post</a></li>
            <li><a href="revision1.php">Reveision 1</a></li>
        </ul>
    </nav>
