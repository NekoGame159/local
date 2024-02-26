<?php
$host_name = "localhost";
$db_name = "users";
$username = "root";
$password = "";

$conn = new mysqli($host_name, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Соединение с базой данных не удалось: " . $conn->connect_error);
}

// Get the ID from the form
$id = $_POST['id'];

// Delete the record with the given ID
$sql = "DELETE FROM users WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully"
    echo "<script> location.href='admin1.html'; </script>";
    exit;
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close the database connection
$conn->close();
?>