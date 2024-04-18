<?php
// Database Configuration
$host = 'localhost';
$db   = 'wp assignment-9';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Insert Record
if(isset($_POST['insert'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    $stmt = $pdo->prepare("INSERT INTO contacts (id, name, email, phone) VALUES (?, ?, ?, ?)");
    $stmt->execute([$id, $name, $email, $phone]);
}

// Update Record
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    $stmt = $pdo->prepare("UPDATE contacts SET name=?, email=?, phone=? WHERE id=?");
    $stmt->execute([$name, $email, $phone, $id]);
}

// Delete Record
if(isset($_POST['delete'])){
    $id = $_POST['id'];
    
    $stmt = $pdo->prepare("DELETE FROM contacts WHERE id=?");
    $stmt->execute([$id]);
}

// Search Record
if(isset($_POST['search'])){
    $search = $_POST['search'];
    
    $stmt = $pdo->prepare("SELECT * FROM contacts WHERE name LIKE ?");
    $stmt->execute(["%$search%"]);
    $results = $stmt->fetchAll();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Database Application</title>
</head>
<body>

<h2>Insert Record</h2>
<form method="post">
    ID: <input type="text" name="id"><br>
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    Phone: <input type="text" name="phone"><br>
    <input type="submit" name="insert" value="Insert">
</form>

<h2>Update Record</h2>
<form method="post">
    ID: <input type="text" name="id"><br>
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    Phone: <input type="text" name="phone"><br>
    <input type="submit" name="update" value="Update">
</form>

<h2>Delete Record</h2>
<form method="post">
    ID: <input type="text" name="id"><br>
    <input type="submit" name="delete" value="Delete">
</form>

<h2>Search Record</h2>
<form method="post">
    Search: <input type="text" name="search"><br>
    <input type="submit" name="searchBtn" value="Search">
</form>

<h2>Search Results</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    <?php
    if(isset($results)){
        foreach($results as $row){
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "</tr>";
        }
    }
    ?>
</table>

</body>
</html>