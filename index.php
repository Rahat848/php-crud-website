<!-- data base connection -->
<?php include './partials/dbconnect.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD WEBSITE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

    <header class="bg-success text-center py-3">
        <h1 class="fw-bold h3 text-white my-1">PHP CRUD WEBSITE</h1>
    </header>

    <!-- insert form starts -->
    <div class="container my-3">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="mb-3">
                    <h3 class="text-center">Insert Data</h3>
                </div>
                <?php
        if(isset($_GET['allreadyexists'])){
           echo "<div class='alert text-center alert-warning alert-dismissible fade show' role='alert'>
        <strong>Error!</strong>. That email address is already in use. Please try again with another email address.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>"; 
        }

        

        if (isset($_GET['passwordmatch'])) {
            echo "<div class='alert text-center  alert-warning alert-dismissible fade show' role='alert'>
            <strong>Error!</strong> Password do not match.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
      ?>
                <form action="./partials/insertdata.php" method="post" class="shadow p-4">
                    
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" name="password" id="Password" placeholder="Password"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="cPassword">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" id="cPassword"
                            placeholder="Confirm Password" required>
                    </div>

                    <label class="mb-3">
                        <input type="checkbox" name="RememberMe" required> Remember Me
                    </label>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    <hr>

                    <p class="text-center mb-0"><span class="fw-bold">Note:</span> please do not put your original email
                        and password.</p>

                </form>
            </div>
        </div>
    </div>
    <!-- insert form ends -->

    <!-- bootstrap js cdn-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>


<!-- include display.php file to partials folder -->
