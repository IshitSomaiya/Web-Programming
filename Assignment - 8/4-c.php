<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];

    if ($number % 2 == 0) {
        echo "$number is even.";
    } else {
        echo "$number is odd.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Odd-Even Checker</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Enter a number:
        <input type="number" name="number" required>
        <input type="submit" value="Check Odd-Even">
    </form>
</body>
</html>