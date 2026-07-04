<?php

// include
include '../config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3">
            <h3>List Customer👤</h3>
            <a href="create.php" class="btn btn-primary text-light py-2 fs-5 px-4">➕ Add Customer</a>
        </div>

        <?php
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            if ($msg === 'success') {
                echo '
                    <div class="alert alert-success" role="alert">
                        Delete Customer successfully
                        </div>
                    ';
            }else{
                echo '
                    <div class="alert alert-danger" role="alert">
                        Delete Customer Fails 
                        </div>
                    ';
            }
        }
        ?>

        <table class="table table-bordered table-hover mt-3 align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>IS_ACTIVE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    
                </tr> -->

                <?php

                #select data from tbcustomer
                $select = "SELECT * FROM `tbcustomer` ORDER BY cus_id desc  ";
                #execute query
                $result = mysqli_query($connection, $select);
                while ($row = $result->fetch_assoc()) {
                    echo '
                            <tr>
                                <td>' . $row['cus_id'] . '</td>
                                <td>' . $row['name'] . '</td>
                                <td>' . $row['gender'] . '</td>
                                <td>' . $row['address'] . '</td>
                                <td>' . $row['is_active'] . '</td>
                                <td>
                                    <a href="edit.php?cus_id='.$row['cus_id'].'" class="btn btn-warning">EDIT</a>
                                    <a href="delete.php?cus_id=' . $row['cus_id'] . '" onclick="return confirm(\'Are you sure?\')" class="btn btn-danger">DELETE</a>
                                </td>
                            </tr>
                        ';
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>