<?php
//On page load
$conn = mysqli_connect("localhost", "root", "", "DatabaseExam");

//delete variable is set
if(isset($_GET['deleteuser']))
{
    $deleteUserId = $_GET['deleteuser'];
    $deleteStatement = "DELETE FROM users WHERE id =".$deleteUserId;
    $deleteImages = "DELETE FROM images WHERE owner = $deleteUserId";
    if($conn->query($deleteImages) == TRUE){
        echo "Images attached to user is deleted<br>";
        if($conn->query($deleteStatement) == TRUE) {
            echo "User deleted";
        }
        else {
            $conn->error;        }
    }
    else {
        echo $conn->error;

    }
}

//delete images from database
if(isset($_GET['deleteImage']))
{
    $imageId= $_GET['deleteImage'];
    $deleteImageById= $deleteImages = "DELETE FROM images WHERE id = $imageId";
    if($conn->query($deleteImageById))
    {
        echo "Image deleted";
    }
    else 
    {
        $conn->error;
    }
    
}

$sql = "SELECT id, username, name FROM users WHERE 1";
$sqlImages = "SELECT * FROM images;";
$result = $conn->query($sql);
$resultImage = $conn->query($sqlImages);
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
        
        <h1>Images:</h1>
        <table style="width:100%; border: 1px solid black;text-align:center;">
            <tr>
                <th>id</th>
                <th>Image</th>
                <th>Owner</th>
                <th>Delete</th>
            </tr>

            <?php 
            while($row = $resultImage->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td><img width='200' height='200' src='".$row['imageURL']."'></td>";
                echo "<td>".$row['owner']."</td>";
                echo "<td><a href='?deleteImage=".$row["id"]."'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>