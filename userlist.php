<?php
$conn = mysqli_connect("localhost", "root", "", "DatabaseExam");
$sql = "SELECT id, username, name FROM users WHERE 1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>User List</title>

    </head>
    <body>
        <h1>Users:</h1>
        <table style="width:100%; border: 1px solid black;text-align:center;">
            <tr>
                <th>id</th>
                <th>Username</th>
                <th>Name</th>
                <th>Delete</th>
            </tr>
            
            <?php 
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td><a href='?delete=".$row["id"]."'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>