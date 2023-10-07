<?php
 include './dbconnect.php';
if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "DELETE FROM `users` WHERE `users`.`id` = $id";
    $delete = mysqli_query($connection, $sql);
    header("Location: /php-crud-website/partials/display.php");
}


?>