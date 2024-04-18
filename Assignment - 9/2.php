<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wp assignment-9";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
    $name = $_POST['name'];
    $job_title = $_POST['job_title'];
    $experience = $_POST['experience'];

    $sql = "INSERT INTO employees (name, job_title, experience) VALUES ('$name', '$job_title', '$experience')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM employees WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch data
$sql = "SELECT id, name, job_title, experience FROM employees ORDER BY experience ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Info</title>
</head>
<body>

<h2>Add Employee</h2>
<form method="post" action="">
    Name: <input type="text" name="name"><br>
    Job Title: <input type="text" name="job_title"><br>
    Experience: <input type="number" name="experience"><br>
    <input type="submit" name="insert" value="Insert">
</form>

<h2>Delete Employee</h2>
<form method="post" action="">
    ID: <input type="number" name="id"><br>
    <input type="submit" name="delete" value="Delete">
</form>

<h2>Employee List</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Job Title</th>
        <th>Experience</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["job_title"] . "</td>";
            echo "<td>" . $row["experience"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No records found</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
// Close connection
$conn->close();
?>