<!-- data base connection -->
<?php include './dbconnect.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


        <!-- jquery data tables css cdn -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
</head>

<body>

    <?php
    $sql = "SELECT * FROM `users`";
    $users = mysqli_query($connection, $sql);
    $num_rows = mysqli_num_rows($users);

    if ($num_rows > 0) {
        echo '
    <div class="bg-success text-center py-2 mb-2">
    <h1 class="fw-bold h3 text-white my-1">Users Data</h1>
    </div>
    
    
    <div class="container-fluid">
    <table id="example" class="display nowrap" style="width:100%">
    <div class="mb-2">
        <a href="/php-crud-website/"><button type="button" class="btn btn-primary">Go Back</button></a>
    </div>
        <thead>
            <tr>
                <th>S.NO</th>
                <th>Email</th>
                <th>Password</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>';

        $no = 1;
        while ($user = mysqli_fetch_assoc($users)) {
            //format date starts;
            $orgDate = $user['date'];
            $newDate = date("d-m-Y", strtotime($orgDate));
            //format date end
            echo "<tr>
        <td>" . $no . "</td>
        <td>" . $user['email'] . "</td>
        <td>" . $user['password'] . "</td>
        <td>" . $newDate . "</td>
        <td>
<a href='/php-crud-website/partials/update.php?id=$user[id]&email=$user[email]&password=$user[password]'><button type='button' class='btn btn-warning'>Update</button></a>
<a href='/php-crud-website/partials/delete.php?id=$user[id]'><button type='button' class='btn btn-danger'>Delete</button></a>
        </td>
            </tr>";
            $no++;
        }

        echo '
        </tbody>
    </table>
</div>';
    }

    ?>


    <!-- data-tables link part starts here -->
    <!-- Jqquery add for using data-tables -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <!-- Initialising DataTables -->
    <script>
        new DataTable('#example', {
            responsive: true,
            rowReorder: {
                selector: 'td:nth-child(2)'
            }
        });
    </script>
    <!-- data-tables link part ends here -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>