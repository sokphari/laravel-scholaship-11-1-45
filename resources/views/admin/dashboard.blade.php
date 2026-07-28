<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Admin Dashboard (Overview) </h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
        </tr>
        <tbody>
            <!-- <tr> -->
                <!-- xss -->
                <!-- <td>{{$customer[0]['id']}}</td>
                <td>{{$customer[0]['name']}}</td>
                <td>{{$customer[0]['phone']}}</td>
            </tr> -->
            @foreach ($customer as $cus)
            <tr>
                    
                <!-- xss -->
                <td>{{$cus['id']}}</td>
                <td>{{$cus['name']}}</td>
                <td>{{$cus['phone']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>