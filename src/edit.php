<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "testdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    
    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET["id"];
    $result = $conn->query("SELECT * FROM users WHERE id=$id");
    $row = $result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>
</head>
<body>
  <h1>Edit User</h1>
  <form method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
    Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
    <input type="submit" value="Update">
  </form>
  <a href="index.php">Back to list</a>
</body>
</html>
