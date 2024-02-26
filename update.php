<?php
$host_name = "localhost";
$db_name = "users";
$username = "root";
$password = "";

$conn = new mysqli($host_name, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Соединение с базой данных не удалось: " . $conn->connect_error);
}


// Get the updated values from the form
$id = $_POST['id'];
$name = $_POST['login'];
$pass = $_POST['password'];

// Update the record in the database with the new values
$sql = "UPDATE users SET login='$name', password='$pass' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    echo "<script> location.href='admin1.html'; </script>";
    exit;
} else {
    echo "Error updating record: " . $conn->error;
}

// Close the database connection
$conn->close();
?>