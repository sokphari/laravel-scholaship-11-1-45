<?php
    $image = "https://i.pinimg.com/736x/16/18/20/1618201e616f4a40928c403f222d7562.jpg";
    $name = "Im Channy Backend Developer 🧑‍💻";
    $age = '';
    $email = '';
    $phone = '';
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
        .container{
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container .card{
            width: 35%;
            height: 55%;
            background-color: gray;
            
        }
        .container .card .bg-card{
            width: 100%;
            height: 40%;
        display: flex;
        justify-content: center;
        flex-direction: column;
        & img{
            margin-left: 145px;
            border-radius: 50%;
        }
        & p{
            text-align: center;
        }
        }
    </style>
<body>
    <div class="container">
        <div class="card">
            <div class="bg-card">
                <img width="150px" height="150px" src="<?php echo $image?>" alt="">
                <p><?= $name ?></p>
            </div>
        </div>
    </div>
</body>
</html>