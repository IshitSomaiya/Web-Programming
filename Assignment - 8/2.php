<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user's name from the form
    $name = $_POST['name'];

    // Store the user's name in a session variable
    $_SESSION['username'] = $name;

    // Set a cookie to remember the user's name for 24 hours
    setcookie('username', $name, time() + (86400 * 30), "/");
}

// Check if the user's name is stored in a session variable
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "Welcome back, $username!<br>";
} else {
    echo "Welcome, Guest!<br>";
}

// Check if the user's name is stored in a cookie
if (isset($_COOKIE['username'])) {
    $cookie_username = $_COOKIE['username'];
    echo "Your name from cookie: $cookie_username";
} else {
    echo "No name stored in cookie.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Session & Cookie Example</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Enter your name: <input type="text" name="name">
        <input type="submit" value="Submit">
    </form>
</body>
</html>
