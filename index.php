<?php
	include 'header.php';
	$text = 'Test 123...';
	$_2text = 'Test 456';
	$_text3 = 'test';
	$first_sentence = 'Building castles in the sky and in the sand';
	$animal = 'Platypus';
?>

<!DOCTYPE html>
<mtml>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="layout.css">


</head>

<body>

	<div class="layout-exercise">
    <h1>Debug Errors</h1>
    <ul>
        <li>Debug this page so the script runs without error</li>
        <li>Print all the variables in an unordered list below:</li>
    </ul>
	</div>

	<div class="layout-solution">
	<h2>Solution</h2>
	<ul>
        <li><?php echo $text; ?></li>
        <li><?php echo $_2text; ?></li>
        <li><?php echo $_text3; ?></li>
        <li><?php echo $first_sentence; ?></li>
        <li><?php echo $animal; ?></li>
    </ul>
	</div>

</body>
</html>