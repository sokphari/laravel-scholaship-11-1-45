<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../controllers/AuthController.php" method="post">
        <input type="text" name="name">
        <input type="text" name="gender">
        <input type="email" name="email">
        <input type="password" name="password">
        <a href="FormLogin.php">login</a>
        <button name="btnRegister" type="submit">create</button> 
    </form>
</body>
</html>