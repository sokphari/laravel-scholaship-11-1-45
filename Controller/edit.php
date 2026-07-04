
<?php

    include('../config.php');

    if(isset($_GET['cus_id'])){

        $id = $_GET['cus_id'];
        #select query
        $select = "SELECT * FROM `tbcustomer` WHERE `cus_id`='$id'";
        $result = mysqli_query($connection,$select);
        $row = $result->fetch_assoc();
        
    }
    if(isset($_POST['btnUpdate'])){
        // validation data
        $id = $_GET['cus_id'];
        $fullName = htmlspecialchars($_POST['name']);
        $gender = $_POST['gender'];
        $address = htmlspecialchars($_POST['address']);
        $is_active = $_POST['is_active'];

        #update query
        $update = "UPDATE `tbcustomer` SET `name`='$fullName',`gender`='$gender',
        `address`='$address',`is_active`='$is_active' WHERE `cus_id` = $id ";

        #execute query
        $result = mysqli_query($connection,$update);
        if($result){
            echo '<scipt>alert("Update successfully")</scipt>';
            header('Location: index.php');
            
        } 
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .form{
            width: 500px;
            height: 500px;
            margin-top: 120px;
            padding: 40px 40px;
            border-radius: 20px ;
            & form{

            }
        }
    </style>
<body>
    <div class="container d-flex justify-content-center">
        <div class="form shadow">
            <h3 class="text-center my-3 mb-4">Form Create Customer</h3>
            <form action="update.php" method="post">
                <input type="hidden" value="<?php $row['cus_id']?>" name="cus_id">
                <div class="form-group mb-3">
                    <input  class="form-control" value="<?php echo $row['name']?>" type="text" name="name" placeholder="enter fullName">
                </div>
                <div class="form-group mb-3">
                    <select name="gender" class="form-control" >
                    <option value="male" <?= $row['gender'] == 'male' ? 'selected' : ''  ?> >Male 🚹</option>
                    <option value="female" <?= $row['gender'] == 'female' ? 'selected' : '' ?>>Female 🚺</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <input type="text" value="<?php echo $row['address']?>" class="form-control" name="address" id="" placeholder="enter Address"/>
                </div>
                <div class="form-group mb-3">
                    <select name="is_active" class="form-control">
                        <option value="0"  <?= $row['is_active'] == '0' ? 'selected' : ''  ?>  >Active</option>
                        <option value="1"  <?= $row['is_active'] == '1' ? 'selected' : ''  ?>  >nactive</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary w-100" name="btnUpdate">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>