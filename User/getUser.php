<?php
require("./php/conn.php");
$uEmail = $_COOKIE['email'];
$sql = "SELECT * FROM `user` WHERE `email` = '$uEmail'";

$results = mysqli_query($conn, $sql);

$num = mysqli_num_rows($results);
if ($num > 0) {
    $user = mysqli_fetch_assoc($results);
    $profilePicture = $user['pp'];
} else {
    echo "NO RESULT FOUND";
}
?>