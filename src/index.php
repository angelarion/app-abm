<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>ABM Application</title>
</head>
<body>
  <h1>Users</h1>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Actions</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?php echo $row["id"]; ?></td>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["email"]; ?></td>
      <td>
        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
        <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
  <br>
  <a href="create.php">Add New User</a>
</body>
</html>

<?php $conn->close(); ?>
