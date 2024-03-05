<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

print "Hello";

echo '<br>';

echo 'it\'s  <strong>Friday</strong> <span style="color: #e41d38;">today</span>';


echo '<br>';

date_default_timezone_set("Africa/Nairobi");

print date("l, jS F Y H:i:s", strtotime("2002-08-15"));

?>
</body>
</html>