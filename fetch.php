<?php

    include("./config.php");
    $select = "SELECT * FROM register ORDER BY id desc LIMIT 5";
    $result = mysqli_query($conn,$select);
    while($row = mysqli_fetch_assoc($result)){
        echo '
             <tr>
                    <td>#'.$row['id'].'</td>
                    <td>
                        <img class="profile-img" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=150&q=80" alt="Profile">
                    </td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['gender'].'</td>
                    <td>'.$row['address'].'</td>
                    <td>'.$row['phone'].'</td>
                    <td>
                        <button class="btn-action btn-edit" title="Edit"><i class="bx bx-edit-alt"></i></button>
                        <button class="btn-action btn-delete" title="Delete"><i class="bx bx-trash"></i></button>
                    </td>
                </tr>
        ';
    }

?>
