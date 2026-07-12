<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div>
            <h3>Form Register</h3>
        </div>
        <form action="../Controller/function.php" method="post">
            <div>
                <input type="text" name="username" id="">
            </div>
            <div>
                <select name="gender" id="">
                    <option value="male">male</option>
                    <option value="female">female</option>
                </select>
            </div>
            <div>
                <input type="email" name="email" id="">
            </div>
            <div>
                <input type="password" name="password" id="">
            </div>
            <a href="#">Already have an account ?</a>
            <button type="submit" name="btnRegister" class="">Create Account</button>
        </form>
    </div>
</body>
</html>