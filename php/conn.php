<?php
$conn = new mysqli("localhost", "root", "", "quickdocs");

if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
} else {
    echo "";
}


?>