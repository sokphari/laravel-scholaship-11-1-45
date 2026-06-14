<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .container {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container form {
        width: 500px;
        height: 450px;
        padding: 40px;
    }
</style>

<body>
    <div class="container pt-5 mt-5">
        <form action="#" class="shadow" method="post">
            <div class="mb-3 form-group">
                <input class="form-control" name="username" placeholder="enter name" type="text">
            </div>
            <div class="mb-3 form-group">
                <input class="form-control" name="email" placeholder="enter email" type="email">
            </div>
            <div class="mb-3 form-group">
                <input class="form-control" name="password" placeholder="enter password" type="password">
            </div>
            <div>
                <button type="submit" name="btnSave" class="btn btn-primary">Save</button>
            </div>
        </form>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PASSWORD</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (isset($_POST['btnSave'])) {
                    $name = $_POST['username'];
                    $email = $_POST['email'];
                    $passwrod = $_POST['password'];
                    echo "
                         <tr>
                            <td>$name</td>
                            <td>$email</td>
                            <td>$passwrod</td>
                        </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>