<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    
    <?php
        include './dbconnect.php';
        $id = $_GET['id'];
        $email = $_GET['email'];
        $password = $_GET['password'];
        echo '<div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="mb-3 text-center">
                    <h3>Update Form</h3>
                </div>
                <form method="post" action="" class="shadow p-4">                  
                    <div class="mb-3">
                        <label for="username">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="email" value='.$email.' required>
                    </div>
    
                    <div class="mb-3">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" name="password" id="Password" placeholder="Password" value='.$password.' required>
                    </div>
    
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
    
                    <hr>
    
                    <p class="text-center mb-0">If you do not update any data, please go back. <a href="/php-crud-website/partials/display.php">Go Back</a></p>
                    
                </form>
            </div>
        </div>
    </div>';

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = $_POST['email'];
            $password= $_POST['password'];
            $sql = "UPDATE `users` SET `email` = '$email',`password` = '$password' WHERE `users`.`id` = $id";
            $update = mysqli_query($connection, $sql);
            header("Location: /php-crud-website/partials/display.php");
          }
        ?>
        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>