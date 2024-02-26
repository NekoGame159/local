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

// Fetch the record with the given ID
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the edit form with the current values of the record
    while($row = $result->fetch_assoc()) {
        echo "<form action='update.php' method='post'>";
        echo "<label for='login'>login:</label><br>";
        echo "<input type='text' id='login' name='login' value='" . $row["login"] . "'><br>";
        echo "<label for='password'>password:</label><br>";
        echo "<input type='text' id='password' name='password' value='" . $row["password"] . "'><br>";
        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
        echo "<input type='submit' value='Update'>";
        echo "</form>";
    }
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>