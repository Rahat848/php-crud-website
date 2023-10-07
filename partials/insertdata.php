<?php
include './dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $existsSql = "SELECT * FROM `users` WHERE email = '$email'";
    $result = mysqli_query($connection, $existsSql);
    $numExistsRows = mysqli_num_rows($result);

    if ($numExistsRows > 0) {
        header('Location: /php-crud-website?allreadyexists=true');
    } else {
        if ($password == $cpassword) {
            $sql = "INSERT INTO `users` (`email`, `password`) VALUES ('$email', '$password')";
            $insert = mysqli_query($connection, $sql);
            if ($insert) {
                header('Location: /php-crud-website/partials/display.php');
            }
        } else {
            header('Location: /php-crud-website?passwordmatch=false');
        }
    }
}

?>