<?php

$name = $_GET["search"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wordpress";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT post_name FROM wp_posts where post_name like '%$name%'";
$result = $conn->query($sql);

if ($result->num_rows > 0 && $name != NULL) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "name : " . $row["post_name"] . "<br>" ;
  }
} else {
  echo "0 results";
}
$conn->close();
?>