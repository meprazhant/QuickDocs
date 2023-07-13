<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<?php


$hey = $_POST['submit'];
if ($hey) {
    require("../php/conn.php");
    $name = $conn->real_escape_string($_POST['title']);
    $email = $_COOKIE['email'];
    $sql = "INSERT INTO `folder`( `name`, `user`,`date`) VALUES ('$name','$email',current_timestamp())";
    $result = mysqli_query($conn, $sql);
    header("Location: /quickdocs/");
    if ($result) {
        // refresh the page with timeout
        header("Refresh:1000");
    } else {
        echo "Error";
    }
}
?>