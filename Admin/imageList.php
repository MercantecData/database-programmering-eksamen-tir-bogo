<?php
require("../connect.php");

session_start();
if(!isset($_SESSION['adminID'])){
    header("location: index.php");
}

if(isset($_GET['delete']))
{
    $imageId= $_GET['delete'];
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
$sqlImages = "SELECT * FROM images;";
$resultImage = $conn->query($sqlImages);

?>
<html>
    <head>
        <title>Image</title>
    </head>
    
    <body>
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