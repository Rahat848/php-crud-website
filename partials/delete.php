<?php
include './dbconnect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `users` WHERE `users`.`id` = $id";
    $delete = mysqli_query($connection, $sql);


    //check database data empty or not.
    $users = "SELECT * FROM `users`";
    $result = mysqli_query($connection, $users);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows == 0) {
        header("Location: /php-crud-website/");
    } else {
        header("Location: /php-crud-website/partials/display.php");
    }

}
?>