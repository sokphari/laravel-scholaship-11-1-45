<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="#" method="post" enctype="multipart/form-data">
            <input type="file" name="image">
            <button type="submit" name="saveImage">Save</button>
        </form>
    </div>
    <?php
        if(isset($_POST['saveImage'])){
            $image = $_FILES['image']['name']; //store name image
            echo $image;
            $imageTmp = $_FILES['image']['tmp_name']; // store image tmp
            echo $imageTmp;
            $imagePath = 'uploads/'.$image;
            echo $imagePath;
            move_uploaded_file($imageTmp,$imagePath);
            echo '<img src="uploads/'.$image.'"alt="">';
            echo 'image uploads successfull 🧑‍💻';
        }
    ?>
</body>
</html>