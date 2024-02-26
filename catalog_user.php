<?php
$host_name = "localhost";
$db_name = "users";
$username = "root";
$password = "";

$conn = new mysqli($host_name, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Соединение с базой данных не удалось: " . $conn->connect_error);
}
// Step 2: Write a SQL query to select the data
$sql = "SELECT * FROM products";

// Step 3: Execute the query and fetch the results
$result = mysqli_query($conn, $sql);

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Step 4: Display the data in an HTML table
echo "<table border='1'>
<tr>
<th>product_name</th>
<th>product_price</th>

</tr>";

foreach ($data as $row) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['product_price']) . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);
?>