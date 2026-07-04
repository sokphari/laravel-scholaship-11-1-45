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
            <form action="store.php" method="post">
                <div class="form-group mb-3">
                    <input  class="form-control" type="text" name="name" placeholder="enter fullName">
                </div>
                <div class="form-group mb-3">
                    <select name="gender" class="form-control" >
                    <option value="male">Male 🚹</option>
                    <option value="female">Female 🚺</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="address" id="" placeholder="enter Address"/>
                </div>
                <div class="form-group mb-3">
                    <select name="is_active" class="form-control">
                        <option value="0">Active</option>
                        <option value="1">nactive</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary w-100" name="btnSave">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>