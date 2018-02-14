<?php
require('connect.php');
session_start();
$usrname = $_POST["username"];
$password = $_POST["password"];


$sql = "SELECT id,username, password, name FROM users WHERE username = '$usrname'";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    if(password_verify($password, $row['password']))
    {
        $id = $row["id"];
        $name = $row["name"];
        $_SESSION['userID'] = $id;
        $_SESSION["userName"] = $name;
    }
}

header("Location: index.php");//redirects back
?>