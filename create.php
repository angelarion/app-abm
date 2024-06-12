<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "testdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST["name"];
    $email = $_POST["email"];

    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Create User</title>
</head>
<body>
  <h1>Create User</h1>
  <form method="POST">
    Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    <input type="submit" value="Create">
  </form>
  <a href="index.php">Back to list</a>
</body>
</html>