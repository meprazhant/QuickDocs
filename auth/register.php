<?php
if (isset($_POST['submit'])) {
    require("../php/conn.php");
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "INSERT INTO `user` (`email`, `name`, `password`,`pp`) VALUES ('$email', '$username', '$password','https://imgv3.fotor.com/images/blog-cover-image/10-profile-picture-ideas-to-make-you-stand-out.jpg')";
    $dubeml = "SELECT * FROM `user` WHERE `email` = '$email'";
    $emres = mysqli_query($conn, $dubeml);
    $emnum = mysqli_num_rows($emres);
    if ($emnum > 0) {
        require_once("./emailExist.php");
        require_once("./index.php");
        exit();
    }
    $result = mysqli_query($conn, $sql);
    if ($result) {
        require_once("./Registered.php");
        require_once("./index.php");
    } else {
        require_once("./index.php");
        require_once("./ErrorOnreg.php");
    }
}
?>