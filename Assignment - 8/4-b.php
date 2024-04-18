<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year = $_POST['year'];

    if ((($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400 == 0)) {
        echo "$year is a leap year.";
    } else {
        echo "$year is not a leap year.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Leap Year Checker</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Enter a year:
        <input type="number" name="year" required>
        <input type="submit" value="Check Leap Year">
    </form>
</body>
</html>