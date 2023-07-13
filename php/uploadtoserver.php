<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<?php


$hey = $_POST['submit'];
if ($hey) {
    if ($_GET['id']) {
        $id = $_GET['id'];
    } else {
        $id = 0;
    }

    $desc = $_POST['desc'];
    $name = $_POST['title'];
    $email = $_COOKIE['email'];
    require("../php/conn.php");
    if ($_FILES['file']) {
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileTmp = $_FILES['file']['tmp_name'];
        $validExt = array('jpg', 'jpeg', 'png');
        $fileExt = explode('.', $fileName);
        $imgext = strtolower(end($fileExt));
        $newimgname = uniqid('', true) . "." . $imgext;
        move_uploaded_file($fileTmp, "../docs/" . $newimgname);
        $go = $newimgname;
        $sql = "INSERT INTO `docs`( `user`, `description`, `time`,`image`,`name`,`folder`) VALUES ('$email','$desc',current_timestamp(),'$newimgname', '$name','$id')";
        $result = mysqli_query($conn, $sql);
        header("Location: /quickdocs/");

    } else {
        echo "Error No Image";
    }
    if ($result) {
        // refresh the page with timeout
        header("Refresh:1000");
    } else {
        echo "Error";
    }
}
?>