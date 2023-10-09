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
    <header class="bg-success text-center py-3">
        <h1 class="fw-bold h3 text-white my-1">Update Data</h1>
    </header>
    <?php
    include './dbconnect.php';
    $showerror = false;
    $id = $_GET['id'];
    $name = $_GET['name'];
    $email = $_GET['email'];

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = ucwords($_POST['name']);
        $email = $_POST['email'];

        $existsSql = "SELECT * FROM `users` WHERE email = '$email'";
        $result = mysqli_query($connection, $existsSql);
        $numExistsRows = mysqli_num_rows($result);
        if ($numExistsRows > 0) {
            $showerror = true;
        } else {

            $sql = "UPDATE `users` SET `name` = '$name', `email` = '$email' WHERE `users`.`id` = $id";
            $update = mysqli_query($connection, $sql);
            header("Location: /php-crud-website/partials/display.php");
        }
    }

    if ($showerror) {
        echo "<div class='alert text-center alert-warning alert-dismissible fade show' role='alert'>
            <strong>Error!</strong>. That email address is already in use. Please try again with another email address.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }
    echo '<div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="post" action="" class="shadow p-4">                  
                    <div class="mb-3">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" value="' . $name . '" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="email" value=' . $email . ' required>
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
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>