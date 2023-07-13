<?php
if (isset($_POST['submit'])) {
    require("../php/conn.php");
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];
        $password = $row['password'];
        $pp = $row['pp'];
        setcookie("name", $name, time() + (86400 * 30), "/");
        setcookie("email", $email, time() + (86400 * 30), "/");
        setcookie("image", $pp, time() + (86400 * 30), "/");
        header("Location: ../");
    } else {
        require_once("./Wronginput.php");
        require_once("./index.php");
    }
}

?>